# Load the project information
set :project_yml_path, "./config/project.yml"
project = YAML.load_file(fetch(:project_yml_path))

# Require multistage for local->staging->production deployment...
require 'capistrano/ext/multistage'

set :scm,                     :git
set :git_enable_submodules,   1
set :stages,                  ["staging", "production"]
set :default_stage,           "staging"
default_run_options[:pty]   = true
ssh_options[:forward_agent] = true

set :application,      project['name']
set :app_name,         project['name']
set :user,             project['deploy_user']
set :app_user,         project['user']
set :app_group,        project['group']
set :app_access_users, project['access_users']
set :app_theme,        project['theme']
set :repository,       project['repo']
set :site_domain,      project['domain']

# Load vpmframe requirements
require 'vpmframe/erb-render'
require 'vpmframe/capistrano/assets'
require 'vpmframe/capistrano/puppet'
require 'vpmframe/capistrano/credentials'
require 'vpmframe/capistrano/permissions'
require 'vpmframe/capistrano/wp-salts'

# Don't do Railsy things...
namespace :deploy do
  task :finalize_update do transaction do end end
  task :migrate do end

  desc "Restart nginx"
  task :restart do
    run "#{sudo} nginx -s reload"
  end
end

# Setup related tasks
before "deploy:setup",
  "puppet:show"

after "deploy:setup",
  "permissions:fix_setup_ownership"

# Compile and upload assets
before "deploy",
  "assets:local_temp_clone",
  "assets:compile_local_assets"

before "deploy:create_symlink",
  "assets:upload_local_assets"

# Fix ownership
before "deploy:restart",
  "permissions:fix_deploy_ownership"

# Cleanup
after "deploy",
  "deploy:cleanup",
  "assets:local_temp_cleanup"
