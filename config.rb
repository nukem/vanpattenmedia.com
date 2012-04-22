# Require
require 'net/ssh'
require 'net/sftp'
require 'rgbapng'

# Config
css_dir			= "css"
sass_dir		= "sass"
images_dir		= "img"
javascripts_dir	= "js"

# WordPress paths: No trailing slashes
wordpress_root	= '/home/vanpattenmedia/staging/vanpattenmedia.com'
rel_theme_path 	= '/content/themes/vanpattenpress'

# Development
# output_style	= :expanded
# line_comments	= true

# Production
line_comments	= false
output_style	= :compressed

# To enable relative paths to assets via compass helper functions. Uncomment:
# relative_assets = true

# Connection Details
sftp_host = 'vanpattenmedia.com'
sftp_user = 'vanpattenmedia'

# Upload
on_stylesheet_saved do |filename|
	$local_path_to_css_file = css_dir + '/' + File.basename(filename)

	Net::SFTP.start( sftp_host, sftp_user ) do |sftp|
		sftp.upload! $local_path_to_css_file, wordpress_root + rel_theme_path + '/' + css_dir + '/' + File.basename(filename)
	end
	puts ">>> File uploaded."
end