# Require multistage for local->staging->production deployment
require 'capistrano/ext/multistage'

# Defaults
set :scm, :git
set :git_enable_submodules, 1
set :stages, ["staging", "production"]
set :default_stage, "staging"

# This site...
set :application, "vanpattenmedia"
set :repository,  "git://github.com/vanpattenmedia/vanpattenmedia.com.git"
set :user, "deploy"