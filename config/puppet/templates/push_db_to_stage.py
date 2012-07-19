#!/usr/bin/env python
#
#
# Push the current database to stage
#
# This script pushes the content in the site database for the current 
# stage to another stage, for example, development -> staging.
#
# It automatically handles the rewriting of key WordPress options siteurl,
# home and upload_path, as well as rewriting content URLs.
#
#
# Requires PyYAML for DB credentials import, Paramiko for SSHing around, and Python-MySQL for string escaping
#
# Assumes Puppet, or deploy:setup has already created the DBs and populated the priv tables with the username/passwords
# specified in database.yml.
#
#
# PLEASE READ THIS:
# This is not perfect. It should not be let loose on untrusted config input yet. Be careful with your YAML, sir.
# You are at your own risk. It works for me on dev -> staging.

import yaml
import os
import sys
from sys import exit
import subprocess
from subprocess import Popen, PIPE, STDOUT
import _mysql
from pprint import pprint

ips = {}
ssh_ports = {}
users = {}
passwords = {}
siteurls = {}
homes = {}
upload_paths = {}
upload_url_paths = {}

#####################################################################################
#                                   Configuration                                   #
#####################################################################################

config_path = 'config/database.yml'

## NOTE: I need to be properly ERBed
## do I actually need to be called by `cap deploy` and not be here?
## does work manually dev -> staging. staging -> production not yet tested

# IPs and ports for connecting to the server for each stage
ips['dev'] = '127.0.0.1'
ssh_ports['dev'] = '2222'
users['dev'] = 'vagrant'
ips['staging'] = '50.116.59.75'
ssh_ports['staging'] = '9012'
users['staging'] = 'deploy'
ips['production'] = '50.116.59.75'
ssh_ports['production'] = '9012'
users['production'] = 'deploy'

# desired WordPress settings for siteurl, home, upload_path and upload_url_path configuration
homes['dev'] = 'http://dev.vanpattenmedia.com/'
siteurls['dev'] = 'http://dev.vanpattenmedia.com/wp'
upload_paths['dev']  = 'content/uploads'
upload_url_paths['dev'] = 'http://dev.vanpattenmedia.com/content/uploads'
homes['staging'] = 'http://staging.vanpattenmedia.com/'
siteurls['staging'] = 'http://staging.vanpattenmedia.com/wp'
upload_paths['staging']  = '../../../../../content/uploads'
upload_url_paths['staging'] = 'http://static.vanpattenmedia.com/content/uploads'

homes['production'] = 'http://www.vanpattenmedia.com/'
siteurls['production'] = 'http://www.vanpattenmedia.com/wp'
upload_paths['production']  = '../../../../../content/uploads'
upload_url_paths['production'] = 'http://static.vanpattenmedia.com/content/uploads'

tblprefix = "wp_" # expecting the same table prefix across stages

#####################################################################################
#                                 End Configuration                                 #
#####################################################################################

# check arguments
if len(sys.argv) < 3:
	print "Usage: " + os.path.basename(__file__) + " source_stage dest_stage"
	print os.path.basename(__file__) + " will automatically determine database credentials from " + config_path + "."
	exit(1)


# bring in database credentials from YAML
try:
        config_file = open(config_path, 'r')
except IOError as e:

        print "Could not open database configuration file from " + config_path + "."
        print "I/O Error({0}): {1}".format(e.errno, e.strerror)
        print "Cannot continue."
        exit(1)

try:
        config = yaml.safe_load(config_file)
except yaml.YAMLError as e:
        print "Unable to parse database configuration file."
        print "YAMLError({0}): {1}".format(e.errno, e.strerror)
	exit(1)

# sanity checking of config YAML
if not sys.argv[1] in config:
        print "The '" + sys.argv[1] + "' stage was not found in the database config YAML file."
        exit(1)
if not sys.argv[2] in config:
	print "The '" + sys.argv[2] + "' stage was not found in the database config YAML file."        
	exit(1)
for stage in [sys.argv[1], sys.argv[2]]:
	if not 'name' in config[stage] or not 'user' in config[stage] or not 'password' in config[stage] or not 'host' in config[stage] or not 'grant_to' in config[stage]:
		print "The '" + stage + "' stage does not have all of the required YAML attributes in the config file."
		exit(1)

source_stage = sys.argv[1]
dest_stage = sys.argv[2]

source_db_prefix = source_stage[0] + "_"
dest_db_prefix = dest_stage[0] + "_"


# get confirmation from the user
confirm = raw_input("Are you sure you want to download the '" + source_stage + "' database and push it to '" + dest_stage + "'? (y/n): ")

if not confirm == 'y' and not confirm == 'Y':
	print "Exiting as requesting."
	exit(1)

# connect to source
source_db = _mysql.escape_string(config[source_stage]['name'])
source_user = _mysql.escape_string(config[source_stage]['user'])
source_pass = _mysql.escape_string(config[source_stage]['password'])


# mysqldump the source

print "Running a mysqldump on the source (" + source_stage + ") database..."

sdump = Popen(['ssh', '-p', ssh_ports[source_stage], '-l', users[source_stage], ips[source_stage], 'mysqldump -u ' + source_user + ' -p' + source_pass + ' ' + source_db], stdout=PIPE, stderr=STDOUT, universal_newlines=True)

source_dump = sdump.communicate()

print "Done."
print


# get confirmation from the user
confirm = raw_input("This is your final chance to cancel the push of the database to '" + dest_stage + "'. Once started, it must not be interrupted, or a restore may be needed. Do you want to go ahead? (y/n): ")

if not confirm == 'y' and not confirm == 'Y':
        print "Exiting as requesting."
        exit(1)


print "Pushing the source (" + source_stage + ") database up to " + dest_stage + "..."
print
print "Depending on upload speed and DB size, this may take a few minutes. Please be patient."

# execute against the destination
dest_db = _mysql.escape_string(config[dest_stage]['name'])
dest_user = _mysql.escape_string(config[dest_stage]['user'])
dest_pass = _mysql.escape_string(config[dest_stage]['password'])

dexec = Popen(['ssh', '-p', ssh_ports[dest_stage], '-l', users[dest_stage], ips[dest_stage], 'mysql -u ' + dest_user + ' -p' + dest_pass + ' ' + dest_db], stdin=PIPE, stdout=PIPE, stderr=STDOUT, universal_newlines=True)

dest_result = dexec.communicate(input=source_dump[0])
print "Done."
print

# now, change the variables that need changing
print "Updating the post_content static content URLs on " + dest_stage + "..."

# get the variables ready
old_upload_url_path = _mysql.escape_string(upload_url_paths[source_stage])
new_upload_url_path = _mysql.escape_string(upload_url_paths[dest_stage])
old_upload_path = _mysql.escape_string(upload_paths[source_stage])
new_upload_path = _mysql.escape_string(upload_paths[dest_stage])
old_siteurl = _mysql.escape_string(siteurls[source_stage])
new_siteurl = _mysql.escape_string(siteurls[dest_stage])
old_home = _mysql.escape_string(homes[source_stage])
new_home = _mysql.escape_string(siteurls[dest_stage])
tblprefix = _mysql.escape_string(tblprefix)

# sub into the MySQL commands
sql = "UPDATE `" + tblprefix + "posts` SET post_content = REPLACE(post_content, '" + old_upload_url_path + "', '" + new_upload_url_path + "');\n\
UPDATE `" + tblprefix + "options` SET option_value = '" + new_siteurl + "' WHERE option_name = 'siteurl';\n\
UPDATE `" + tblprefix + "options` SET option_value = '" + new_home + "' WHERE option_name = 'home';\n\
UPDATE `" + tblprefix + "options` SET option_value = '" + new_upload_path + "' WHERE option_name = 'upload_path';\n\
UPDATE `" + tblprefix + "options` SET option_value = '" + new_upload_url_path + "' WHERE option_name = 'upload_url_path';\n\
"

uexec =  Popen(['ssh', '-p', ssh_ports[dest_stage], '-l', users[dest_stage], ips[dest_stage], 'mysql -u ' + dest_user + ' -p' + dest_pass + ' ' + dest_db], stdin=PIPE, stdout=PIPE, stderr=STDOUT, universal_newlines=True)

update_result = uexec.communicate(input=sql)

print "Done."
print


print
print "All done!"
