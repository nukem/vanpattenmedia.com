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
set :repository,       project['repo']
set :site_domain,      project['domain']

# Load vpmframe requirements
require 'vpmframe/erb-render'
require 'vpmframe/capistrano/assets'
require 'vpmframe/capistrano/puppet'
require 'vpmframe/capistrano/credentials'
require 'vpmframe/capistrano/permissions'

# Don't do Railsy things...
namespace :deploy do
  task :finalize_update do transaction do end end
  task :migrate do end

  desc "Restart nginx"
  task :restart do
    run "#{sudo} nginx -s reload"
  end
end

namespace :jekyll do
  desc "Compile the jekyll site"
  task :compile, :roles => :app do
    # CSS
    system("cd ~/.captemp/#{fetch(:application)} && compass compile -e production --force")

    # JavaScript
    system("cd ~/.captemp/#{fetch(:application)} && jammit -c config/assets.yml")

    # Images
    system("cp -R ~/.captemp/#{fetch(:application)}/app/assets/images/ ~/.captemp/#{fetch(:application)}/raw/images")
    system("image_optim --no-pngout ~/.captemp/#{fetch(:application)}/raw/images")

    # Jekyll
    system("cd ~/.captemp/#{fetch(:application)} && jekyll")
  end

  desc "Upload the jekyll site"
  task :upload, :roles => :app do
    system("scp -r -P #{fetch(:app_port)} ~/.captemp/#{fetch(:application)}/public #{fetch(:user)}@#{fetch(:app_server)}:#{release_path}/")
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
  "jekyll:compile"

before "deploy:create_symlink",
  "jekyll:upload"

# Fix ownership
before "deploy:restart",
  "permissions:fix_deploy_ownership"

# Cleanup
after "deploy",
  "deploy:cleanup",
  "assets:local_temp_cleanup"
