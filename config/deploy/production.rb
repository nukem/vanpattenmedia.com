# Server options
server "50.116.59.75", :app, :web, :db, :primary => true
ssh_options[:port]        = 9012
default_run_options[:pty] = true

# Deploy path
set(:deploy_to)           { "/home/vanpattenmedia/vanpattenmedia.com" }
set(:releases_path)       { File.join(deploy_to, version_dir) }
set(:shared_path)         { File.join(deploy_to, shared_dir) }
set(:current_path)        { File.join(deploy_to, current_dir) }
set(:release_path)        { File.join(releases_path, release_name) }

# nginx config
set(:domain_name)         { "vanpattenmedia.com" }
set(:wp_theme_name)       { "vanpattenpress" }
set(:staging)             { false }

after "deploy:setup", "nginx:config"
after "deploy", "nginx_prod:reload"

namespace :nginx do
	task :config do
		run "echo hi"
		nginx_config_template = ERB.new(File.read("./config/deploy/templates/nginx.erb"), nil, '<>')
		result = nginx_config_template.result(binding)
		put(result, "#{deploy_to}/shared/#{application}")
		#put nginx_config, "#{deploy_to}/shared/#{application}"
		#run "#{sudo} mv #{deploy_to}/shared/#{application} /etc/nginx/sites-available/#{application}"
		#run "#{sudo} chown root:root /etc/nginx/sites-available/#{application}"
		#run "#{sudo} ln -s /etc/nginx/sites-available/#{application} /etc/nginx/sites-enabled/#{application}"
		#run "#{sudo} chown root:root /etc/nginx/sites-enabled/#{application}"
	end

	task :reload do
		run "#{sudo} nginx -s reload"
	end
end