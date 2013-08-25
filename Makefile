RAW = ./app/assets
COMPILED = ./public/assets

assets: images javascripts css

css:
	bundle exec compass compile

javascripts:
	bundle exec jammit

images:
	mkdir -p $(COMPILED)/images/
	cp -R $(RAW)/images/ $(COMPILED)/images/
	image_optim --recursive --no-pngout $(COMPILED)/images/

clean: clean-css clean-javascripts clean-images

clean-css:
	rm -rf $(COMPILED)/stylesheets/

clean-javascripts:
	rm -rf $(COMPILED)/javascripts/

clean-images:
	rm -rf $(COMPILED)/images/

.PHONY: assets css javascripts images clean clean-css clean-javascripts clean-images
