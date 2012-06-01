# Require multistage for local->staging->production deployment...
require "capistrano/ext/multistage"

# Defaults...
set :scm, :git
set :git_enable_submodules, 1
set :stages, ["staging", "production"]
set :default_stage, "staging"

# This site...
set :application, "vanpattenmedia"
set :repository,  "git://github.com/vanpattenmedia/vanpattenmedia.com.git"
set :user, "chris"
set :app_user, "vanpattenmedia"
set :app_group, "vanpattenmedia-sitewriters"

# Don't do Railsy things...
namespace :deploy do
	task :finalize_update do
		transaction do
			# run "chmod -R g+w #{releases_path}/#{release_name}"
		end
	end

	task :migrate do
		# do nothing
	end

	task :restart do
		# do nothing
	end
end

# Set up some VPM-specific tasks
before "deploy:setup", "vpm:create_folder"
after "deploy:setup", "vpm:fix_setup_ownership"
after "deploy", "vpm:fix_deploy_ownership"

namespace :vpm do
	desc "Create the environment folder"
	task :create_folder, :roles => :app do
		run "mkdir #{deploy_to}"
	end

	desc "Fix ownership on setup"
	task :fix_setup_ownership, :roles => :app do
		run "#{sudo} chown -R #{app_user}:#{app_group} #{deploy_to} #{deploy_to}/releases #{deploy_to}/shared #{deploy_to}/shared/system #{deploy_to}/shared/log #{deploy_to}/shared/pids"
	end

	desc "Fix ownership on deploy"
	task :fix_deploy_ownership, :roles => :app do
		run "#{sudo} chown --dereference -RL #{app_user}:#{app_group} #{deploy_to}/current"
	end
end