# Server options
server "50.116.59.75", :app, :web, :db, :primary => true
ssh_options[:port] = 9012
default_run_options[:pty] = true

# Deploy path
set :deploy_to, "/home/vanpattenmedia/staging.vanpattenmedia.com"

# nginx config
set :domain_name, "staging.vanpattenmedia.com"
set :wp_theme_name, "vanpattenpress"
set :staging, true

after "deploy:check", "nginx:config"
after "deploy", "nginx:reload"

namespace :nginx do
	task :config do
		nginx_config = ERB.new(File.read("./config/deploy/templates/nginx.erb")).result(binding)
		put nginx_config, "#{deploy_to}/shared/#{application}-staging"
		run "#{sudo} mv #{deploy_to}/shared/#{application}-staging /etc/nginx/sites-available/#{application}-staging"
		run "#{sudo} ln -s /etc/nginx/sites-available/#{application}-staging /etc/nginx/sites-enabled/#{application}-staging"
	end

	task :reload do
		run "#{sudo} nginx -s reload"
	end
end