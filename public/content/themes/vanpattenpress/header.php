<?php global $a; ?>	<header id="header" class="clearfix">
		<div class="container">
			<div id="alert-container">
				<div id="alert-announcement">
					<p><strong>New:</strong> We just released a new WordPress plugin that makes sliders awesome. <a href="http://www.vanpattenmedia.com/project/total-slider/?utm_source=vpmwebsite&utm_medium=alert&utm_campaign=totalslider" class="button">Check out Total Slider</a></p>
				</div>
			</div>
			<div class="eight columns" id="header-inner">
				<a href="<?php echo home_url(); ?>" id="logo"><img src="<?= $a->url('img', 'logo.png') ?>" alt="Van Patten Media logo" id="vpm-logo"></a>
			</div>
		</div>
	</header>
	<div class="container" id="header-nav">
		<nav class="eight columns offset-by-eight">
			<?php wp_nav_menu( array(
				'menu' => 'primary-menu',
				'container' => 'false',
				'walker' => new Roots_Navbar_Nav_Walker(),
			)); ?>
		</nav>
	</div>