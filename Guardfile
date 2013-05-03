group :development do

  # LiveReload
  guard 'livereload' do
    watch(%r{.+\.(css|js|html?|php|inc|png|jpg|gif)$})
  end

  guard 'shell' do

    # images
    watch(%r{app/assets/images/(.+\/)?(.+\.[gif|jpg|png]+)}) do |m|
      `mkdir -p ./raw/images/#{m[1]}`
      `cp #{m[0]} ./raw/images/#{m[1]}#{m[2]}`
      `image_optim --no-pngout ./raw/images/#{m[1]}#{m[2]}`
    end

    # css
    watch(%r{(.*)\.s[ac]ss$}) do
      `make css`
    end

    # javascripts
    watch(%r{(?:javascripts)(/.+)\.(js)}) do
      `make javascripts`
    end

    watch('config/assets.yml') do
      `make javascripts`
    end

  end

end
