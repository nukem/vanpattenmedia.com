# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant::Config.run do |config|
  config.vm.box = "vpm_vagrant"
  config.vm.network :hostonly, "192.168.33.10"

  # bring in the YAML!!!111!1oneONE
  require "yaml"
  require "erb"

  project  = YAML.load_file("./config/project.yml")
  database = YAML.load_file("./config/database.yml")

  app_theme     = project['application']['theme']
  app_name      = project['application']['name']
  app_user      = "vagrant"
  app_group     = "vagrant"
  app_stage     = "dev"
  app_domain    = "#{app_stage}." + project['application']['domain']
  app_deploy_to = "/home/#{app_user}/#{app_domain}"

  db_name       = database['development']['name']
  db_user       = database['development']['user']
  db_password   = database['development']['password']
  db_host       = database['development']['host']

  config.vm.share_folder("v-root", "#{app_deploy_to}/current", ".")

  config.vm.provision :puppet do |puppet|
    # Grab the manifest erb
    pp_erb = ERB.new( File.read('config/puppet/templates/site.pp.erb') )

    # Write it out to a file
    File.open('config/puppet/rendered/site.pp', 'w') do |f|
      f.write pp_erb.result(binding)
    end

    puppet.manifests_path = "./config/puppet/rendered"
    puppet.manifest_file = "site.pp"
  end
end