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
	# Fonts
    system("cp -R ~/.captemp/#{fetch(:application)}/app/assets/fonts/ ~/.captemp/#{fetch(:application)}/raw/fonts")

    # JavaScript
    system("cd ~/.captemp/#{fetch(:application)} && make assets")
  end

  desc "Upload the jekyll site"
  task :upload, :roles => :app do
    system("scp -r -P #{fetch(:app_port)} ~/.captemp/#{fetch(:application)}/public #{fetch(:user)}@#{fetch(:app_server)}:#{release_path}/")
  end
end

namespace :puppet do

  desc "Set up puppet"
  task :show, :roles => :app do
    # Remove any existing directories, so we can reupload them
    run "rm -rf /home/#{fetch(:user)}/tmp/#{fetch(:app_name)}/#{fetch(:app_stage)}"

    # Make the directory again
    run "mkdir -p /home/#{fetch(:user)}/tmp/#{fetch(:app_name)}/#{fetch(:app_stage)}"

    # Upload the configurations
    upload("./config/erb-render.rb", "/home/#{fetch(:user)}/tmp/#{fetch(:app_name)}/#{fetch(:app_stage)}/erb-render.rb", :via => :scp)
    upload("./config/puppet", "/home/#{fetch(:user)}/tmp/#{fetch(:app_name)}/#{fetch(:app_stage)}", :via => :scp, :recursive => :true)
    upload("./config/nginx", "/home/#{fetch(:user)}/tmp/#{fetch(:app_name)}/#{fetch(:app_stage)}/nginx", :via => :scp, :recursive => :true)
    upload("./config/varnish", "/home/#{fetch(:user)}/tmp/#{fetch(:app_name)}/#{fetch(:app_stage)}/varnish", :via => :scp, :recursive => :true)

    # Render the manifest
    puppet_manifest = ERB.new(File.read("./config/puppet/site.pp.erb")).result(binding)
    put puppet_manifest, "/home/#{fetch(:user)}/tmp/#{fetch(:app_name)}/#{fetch(:app_stage)}/site.pp"

    # Apply the manifest
    run "#{sudo} puppet apply /home/#{fetch(:user)}/tmp/#{fetch(:app_name)}/#{fetch(:app_stage)}/site.pp"
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
