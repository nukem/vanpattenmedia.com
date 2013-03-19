# Set stage
set :app_stage, "production"

# Load configuration YML
set :project_yml_path,  "./config/project.yml"
project  = YAML.load_file(fetch(:project_yml_path))

# Stage-specific server options
set :app_server, project['stage'][fetch(:app_stage)]['ip']
set :app_port,   project['stage'][fetch(:app_stage)]['ssh_port']

server fetch(:app_server), :app, :web, :db, :primary => true
ssh_options[:port] = fetch(:app_port)

# Stage-specific application info
set :app_domain,    project['domain']
set :deploy_to,     "/home/#{fetch(:app_user)}/#{fetch(:app_domain)}"
set :app_deploy_to, fetch(:deploy_to)
