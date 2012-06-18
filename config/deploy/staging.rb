# Server options
server "50.116.59.75", :app, :web, :db, :primary => true
ssh_options[:port]        = 9012
default_run_options[:pty] = true

# Deploy path
set :deploy_to, "/home/#{app_user}/#{app_domain}"
set :app_deploy_to, fetch(:deploy_to)

project  = YAML.load_file("./config/project.yml")
database = YAML.load_file("./config/database.yml")

set :db_name,     database['dev']['name']
set :db_user,     database['dev']['user']
set :db_password, database['dev']['password']
set :db_host,     database['dev']['host']
set :db_grant_to, database['dev']['grant_to']

# nginx config
set :app_name,   project['application']['name']
set :app_theme,  project['application']['theme']
set :app_theme,  "vanpattenpress"
set :app_stage,  "staging"
set :app_domain, "#{app_stage}." + project['application']['domain']

before "deploy:setup", "puppet:show"

namespace :puppet do
  desc "Set up puppet"
  task :show, :roles => :app do
    puppet_manifest = ERB.new(File.read("./config/puppet/templates/site.pp.erb")).result(binding)
    put puppet_manifest, "/home/#{fetch(:user)}/tmp/#{fetch(:app_name)}-#{fetch(:app_stage)}.pp"

    run "#{sudo} puppet apply /home/#{fetch(:user)}/tmp/#{fetch(:app_name)}-#{fetch(:app_stage)}.pp"
  end
end