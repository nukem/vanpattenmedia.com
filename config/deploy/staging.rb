# Server options
server "50.116.59.75", :app, :web, :db, :primary => true
ssh_options[:port] = 9012
default_run_options[:pty] = true

# Deploy path
set :deploy_to, "/home/vanpattenmedia/staging.vanpattenmedia.com"