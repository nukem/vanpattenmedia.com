# Server options
server "50.116.59.75", :app, :web, :db, :primary => true
ssh_options[:port] = 9012
default_run_options[:pty] = true

# Deploy path
set :deploy_to, "/home/vanpattenmedia/staging.vanpattenmedia.com"

# nginx config
set :domain_name, "staging.vanpattenmedia.com"
set :wp_theme_name, "vanpattenpress"

after "deploy:setup", "nginx:config"
after "deploy", "nginx:reload"

namespace :nginx do
	task :config do
		db_config = ERB.new File.new("config/templates/nginx.erb").read
		put db_config.result, "/etc/nginx/sites-available/#{application}-staging"
	end

	task :reload do
		run "nginx -s reload"
	end
end