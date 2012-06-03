# Server options
server "50.116.59.75", :app, :web, :db, :primary => true
ssh_options[:port]        = 9012
default_run_options[:pty] = true

# Deploy path
set :deploy_to,             "/home/vanpattenmedia/vanpattenmedia.com"

# nginx config
set :domain_name,           "vanpattenmedia.com"
set :wp_theme_name,         "vanpattenpress"
set :staging,               true

after "deploy:setup", "nginx:config"

namespace :nginx do
	desc "Set up nginx configs for the production environment"
	task :config do
		nginx_config = ERB.new(File.read("./config/deploy/templates/nginx.erb")).result(binding)
		put nginx_config, "#{deploy_to}/shared/#{application}"
		run "#{sudo} mv #{deploy_to}/shared/#{application} /etc/nginx/sites-available/#{application}"
		run "#{sudo} chown root:root /etc/nginx/sites-available/#{application}"
		run "#{sudo} ln -s /etc/nginx/sites-available/#{application} /etc/nginx/sites-enabled/#{application}"
		run "#{sudo} chown root:root /etc/nginx/sites-enabled/#{application}"
	end
end