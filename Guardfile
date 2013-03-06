group :development do
  # Compass
  guard 'compass' do
    watch(%r{(.*)\.s[ac]ss$})
  end

  # LiveReload
  guard 'livereload' do
    watch(%r{.+\.(css|js|html?|php|inc|png|jpg|gif)$})
  end

  # Jammit
  guard 'jammit', :output_folder => "./raw/javascripts/" do
    watch('config/assets.yml') # Make sure we're using the latest assets.yml file
    watch(%r{(?:javascripts)(/.+)\.(js)}) { |m| m[0] unless m[1] =~ /\/\./ }
  end

  # Images
  guard 'shell' do
    watch(%r{app/assets/images/(.+\/)?(.+\.[gif|jpg|png]+)}) do |m|
      `mkdir -p ./raw/images/#{m[1]}`
      `cp #{m[0]} ./raw/images/#{m[1]}#{m[2]}`
      `image_optim --no-pngout ./raw/images/#{m[1]}#{m[2]}`
    end
  end
end
