RAW = ./app/assets
COMPILED = ./raw

assets: images javascripts css

css:
	compass compile

javascripts:
	jammit

images:
	mkdir -p $(COMPILED)/images/
	cp -R $(RAW)/images/ $(COMPILED)/images/
	image_optim --recursive --no-pngout $(COMPILED)/images/

clean: clean-css clean-javascripts clean-images

clean-css:
	rm -rf $(COMPILED)/css/

clean-javascripts:
	rm -rf $(COMPILED)/js/

clean-images:
	rm -rf $(COMPILED)/img/

.PHONY: assets css javascripts images clean clean-css clean-javascripts clean-images
