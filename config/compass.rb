# Require some gems
require 'rgbapng'
require 'susy'
require 'sass-globbing'

# Path to theme from project root
project_path      = "./"

# Where's stuff being spit out?
css_dir           = "public/assets/stylesheets"
images_dir        = "public/assets/images"
javascripts_dir   = "public/assets/javascripts"
fonts_dir         = "public/assets/fonts"

# Where are we pulling from?
sass_dir          = "app/assets/sass"
add_import_path   = "vendor/sass"

# What should the output look like?
output_style  = :compressed
line_comments = false

# Enable relative asset paths
relative_assets = true
