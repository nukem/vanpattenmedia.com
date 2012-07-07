<?php global $a; ?>	<header id="header" class="clearfix">
		<div class="container">
			<div class="eight columns">
				<a href="<?php echo home_url(); ?>" id="logo"><img src="<?= $a->url('img', 'logo.png') ?>" alt="Van Patten Media logo" id="vpm-logo" height="78"></a>
			</div>
			<nav class="eight columns" id="header-nav">
				<?php wp_nav_menu( array(
					'menu' => 'primary-menu',
					'container' => 'false',
					'walker' => new Roots_Navbar_Nav_Walker(),
				)); ?>
			</nav>
		</div>
		<div id="header-background" style="background-image: url(/img/e:grayblur/b:100/w:1200/static.vanpattenmedia.com/content/uploads/2012/02/Susan-Egan-Meg-in-Hercules-Belle-on-Broadway-everyday-Mom-700x525.png)">
			<div class="container">
				<div id="alert">Now available: Total Slider 1.0.4. <a href="http://wordpress.org/extend/plugins/total-slider/changelog/">Read more...</a></div>
			</div>
		</div>
	</header>