# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant::Config.run do |config|

  # bring in the YAML!!!111!1oneONE
  require "yaml"
  require "erb"

  project = YAML.load_file("./config/project.yml")

  repo          = project['application']['repo']
  wp_theme_name = project['application']['theme']
  application   = project['application']['name']
  user          = "vagrant"
  group         = "vagrant"
  stage         = "development"
  domain_name   = "dev." + project['application']['domain']
  deploy_to     = "/vagrant"

  # bring in DB details
  database = YAML.load_file("./config/database.yml")
  db_name = database['development']['name']
  db_user = database['development']['user']
  db_password = database['development']['password']
  db_host = database['development']['host']

  # these variables are now ready for hardcore ERBing

  config.vm.box = "vpm_vagrant"
  config.vm.network :hostonly, "192.168.33.10"

  config.vm.provision :puppet do |puppet|
    # Grab the manifest erb
    pp_erb = ERB.new( File.read('config/puppet/site.pp.erb') )

    # Write it out to a file
    File.open('config/puppet/site.pp', 'w') do |f|
      f.write pp_erb.result(binding)
    end

    puppet.manifests_path = "config/puppet/rendered"
    puppet.manifest_file = "site.pp"
  end
end