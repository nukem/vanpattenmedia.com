# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant::Config.run do |config|

	# bring in the YAML!!!111!1oneONE
	require "yaml"
	require "erb"

	project = YAML.load_file("./config/project.yml")

	app = project['application']['name']
	repo = project['application']['repo']
	user = project['application']['user']
	group = project['application']['group']
	theme = project['application']['theme']
	# these variables are now ready for hardcore ERBing


	config.vm.box = "vpm_vagrant"
	config.vm.network :hostonly, "192.168.33.10"

	config.vm.provision :puppet do |puppet|
		# prepare the site ERB for Puppet
		nginx_erb = ERB.new( File.read('config/puppet/files/vagrant_nginx.erb') )
		# write to file
		File.open('config/puppet/files/vagrant_nginx_postprocess', 'w') do |f|
			f.write nginx_erb.result(binding)
		end

        	puppet.manifests_path = "config/puppet"
        	puppet.manifest_file = "vagrant.pp"
	end


end
