# Server options
server "50.116.59.75", :app, :web, :db, :primary => true
ssh_options[:port]        = 9012
default_run_options[:pty] = true

# Set stage
set :app_stage,  "staging"

project  = YAML.load_file("./config/project.yml")
database = YAML.load_file("./config/database.yml")

set :db_name,     database[fetch(:app_stage)]['name']
set :db_user,     database[fetch(:app_stage)]['user']
set :db_password, database[fetch(:app_stage)]['password']
set :db_host,     database[fetch(:app_stage)]['host']
set :db_grant_to, database[fetch(:app_stage)]['grant_to']

# nginx config
set :app_name,   project['application']['name']
set :app_theme,  project['application']['theme']
set :app_theme,  "vanpattenpress"
set :app_domain, "#{app_stage}." + project['application']['domain']

# Deploy path
set :deploy_to, "/home/#{fetch(:app_user)}/#{fetch(:app_domain)}"
set :app_deploy_to, fetch(:deploy_to)

before "deploy:setup", "puppet:show"

namespace :puppet do
  desc "Set up puppet"
  task :show, :roles => :app do
    run "mkdir -p /home/#{fetch(:user)}/tmp/#{fetch(:app_name)}/#{fetch(:app_stage)}"
    upload("./config/puppet/templates", "/home/#{fetch(:user)}/tmp/#{fetch(:app_name)}/#{fetch(:app_stage)}", :via => :scp, :recursive => :true)

    puppet_manifest = ERB.new(File.read("./config/puppet/templates/site.pp.erb")).result(binding)
    put puppet_manifest, "/home/#{fetch(:user)}/tmp/#{fetch(:app_name)}/#{fetch(:app_stage)}/site.pp"

    run "#{sudo} puppet apply /home/#{fetch(:user)}/tmp/#{fetch(:app_name)}/#{fetch(:app_stage)}/site.pp"
  end
end