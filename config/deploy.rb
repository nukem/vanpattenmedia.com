# Require multistage for local->staging->production deployment...
require "capistrano/ext/multistage"

# Defaults...
set :scm, :git
set :git_enable_submodules, 1
set :stages, ["staging", "production"]
set :default_stage, "staging"
set :deploy_via, :remote_cache

# This site...
set :application, "vanpattenmedia"
set :repository,  "git://github.com/vanpattenmedia/vanpattenmedia.com.git"
set :user, "deploy"
set :app_user, "vanpattenmedia"
set :app_group, "vanpattenmedia-sitewriters"

# Don't do Railsy things...
namespace :deploy do
  task :finalize_update do
    transaction do
      # do nothing
    end
  end

  task :migrate do
    # do nothing
  end

  task :restart do
    run "#{sudo} nginx -s reload"
  end
end

# Set up some VPM-specific tasks
# before "deploy:setup", "vpm:create_folder"
after "deploy:setup", "vpm:fix_setup_ownership", "vpm:upload_db_cred"
after "deploy", "vpm:fix_deploy_ownership", "vpm:symlink_db_cred"

namespace :vpm do
  desc "Fix ownership on setup"
  task :fix_setup_ownership, :roles => :app do
    run "#{sudo} chown #{app_user}:#{app_group} #{deploy_to}"
    run "#{sudo} chown -R #{user}:#{user} #{deploy_to}/releases #{deploy_to}/shared #{deploy_to}/shared/system #{deploy_to}/shared/log #{deploy_to}/shared/pids"
    run "#{sudo} chmod -R g+s #{deploy_to}/releases #{deploy_to}/shared #{deploy_to}/shared/system #{deploy_to}/shared/log #{deploy_to}/shared/pids"
  end

  desc "Fix ownership on deploy"
  task :fix_deploy_ownership, :roles => :app do
    run "#{sudo} chown --dereference -RL #{app_user}:#{app_group} #{deploy_to}/current/public"
    run "#{sudo} chmod -R g+s #{deploy_to}/current/public"
  end

  desc "Upload database credentials to the shared directory"
  task :upload_db_cred, :roles => :app do
    run "mkdir #{shared_path}/config"
    upload("./config/database.yml", "#{shared_path}/config/database.yml")
  end

  desc "Symlink database credentials to the current release directory"
  task :symlink_db_cred, :roles => :app do
    run "#{sudo} ln -nfs #{shared_path}/config/database.yml #{release_path}/config/database.yml"
  end
end