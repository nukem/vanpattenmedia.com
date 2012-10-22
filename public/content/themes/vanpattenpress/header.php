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
				<?php
				$vpm_options = get_page_by_path('vpm_options');
				?>
				<div id="alert"><?= get_post_meta( $vpm_options->ID, 'vpm_site_alert', true ) ?></div>
			</div>
		</div>
	</header>
