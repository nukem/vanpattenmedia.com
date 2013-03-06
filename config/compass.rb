# Require some gems
require 'rgbapng'
require 'sass-globbing'
require 'susy'

# Path to theme from project root
project_path      = "./"

# Where's stuff being spit out?
css_dir           = "raw/css"
images_dir        = "raw/images"
javascripts_dir   = "raw/javascripts"
fonts_dir         = "raw/fonts"

# Where are we pulling from?
sass_dir          = "app/assets/sass"
add_import_path   = "vendor/sass"

# What should the output look like?
output_style  = :compressed
line_comments = false

# Enable relative asset paths
relative_assets = true
