# Server options
server "50.116.59.75", :app, :web, :db, :primary => true
ssh_options[:port]        = 9012
default_run_options[:pty] = true

# Deploy path
set :deploy_to,             "/home/vanpattenmedia/staging.vanpattenmedia.com"

# nginx config
set :domain_name,           "staging.vanpattenmedia.com"
set :wp_theme_name,         "vanpattenpress"
set :staging,               true

after "deploy:setup", "nginx:config"
after "deploy:setup", "fpm:new_pool"

namespace :nginx do
	desc "Set up nginx configs for the staging environment"
	task :config, :roles => :app do
		nginx_config = ERB.new(File.read("./config/deploy/templates/nginx.erb")).result(binding)
		put nginx_config, "#{deploy_to}/shared/#{application}-staging"
		run "#{sudo} mv #{deploy_to}/shared/#{application}-staging /etc/nginx/sites-available/#{application}-staging"
		run "#{sudo} chown root:root /etc/nginx/sites-available/#{application}-staging"
		run "#{sudo} ln -s /etc/nginx/sites-available/#{application}-staging /etc/nginx/sites-enabled/#{application}-staging"
		run "#{sudo} chown root:root /etc/nginx/sites-enabled/#{application}-staging"
	end
end

namespace :fpm do
	desc "Add a new PHP-FPM pool"
	task :new_pool, :roles => :app do
		php_fpm_config = ERB.new(File.read("./config/deploy/templates/php-fpm.erb")).result(binding)
		put php_fpm_config, "#{deploy_to}/shared/#{application}.pool.conf"
		run "#{sudo} mv #{deploy_to}/shared/#{application}.pool.conf /etc/php5/fpm/pool.d/#{application}.pool.conf"
		run "#{sudo} chown root:root /etc/php5/fpm/pool.d/#{application}.pool.conf"
		run "#{sudo} service php5-fpm restart"
	end
end