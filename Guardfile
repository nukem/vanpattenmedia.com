require "yaml"
project = YAML.load_file("./config/project.yml")

group :development do
  # LiveReload
  guard 'livereload' do
    watch(%r{.+\.(css|js|html?|php|inc|png|jpg|gif)$})
  end
end

group :compile do
  # Images
  guard 'shell' do
    watch(%r{app/assets/images/(.+\/)?(.+\.[gif|jpg|png]+)}) do |m|
      `mkdir -p ./public/content/themes/#{project["application"]["theme"]}/img/#{m[1]}`
      `cp #{m[0]} ./public/content/themes/#{project["application"]["theme"]}/img/#{m[1]}#{m[2]}`
      `open -a ImageOptim.app ./public/content/themes/#{project["application"]["theme"]}/img/#{m[1]}#{m[2]}`
    end
  end

  # Compass
  guard 'compass' do
    watch(%r{(.*)\.s[ac]ss$})
  end

  # Jammit
  guard 'jammit', :output_folder => "./public/content/themes/" + project["application"]["theme"] + "/js/" do
    watch('config/assets.yml') # Make sure we're using the latest assets.yml file
    watch(%r{(?:javascripts)(/.+)\.(js)}) { |m| m[0] unless m[1] =~ /\/\./ }
  end
end