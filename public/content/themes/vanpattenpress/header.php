<?php global $a; ?>	<header id="header" class="clearfix">
		<!-- <div id="alert-container">
			<div id="alert-announcement">
				<p><strong>New:</strong> We just released a new WordPress plugin that makes sliders awesome. <a href="http://www.vanpattenmedia.com/project/total-slider/?utm_source=vpmwebsite&utm_medium=alert&utm_campaign=totalslider" class="button">Check out Total Slider</a></p>
			</div>
		</div> -->
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
		<div id="header-background" style="background-image: url('http://dev.vanpattenmedia.com/img/e:grayblur/b:100/w:1200/static.vanpattenmedia.com/content/uploads/2012/02/Susan-Egan-Meg-in-Hercules-Belle-on-Broadway-everyday-Mom-700x525.png');">
			<div class="container">
				<div id="alert">Now available: Total Slider 1.0.4. <a href="#">Read more...</a></div>
			</div>
		</div>
	</header>