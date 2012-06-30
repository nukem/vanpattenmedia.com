guard 'compass' do
  watch(%r{(.*)\.s[ac]ss$})
end

guard 'livereload' do
  watch(%r{.+\.(css|js|html?|php|inc)$})
end

guard 'sprockets', :destination => 'public/content/themes/vanpattenpress/js', :asset_paths => ['/app/assets/javascripts'], :minify => true do
  watch 'app/assets/javascripts/script.js'
end