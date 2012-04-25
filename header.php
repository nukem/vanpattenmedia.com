	<header id="header">
		<div class="sixteen columns">
			<div class="row">
				<a href="<?php echo home_url(); ?>" id="logo"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="Van Patten Media logo" id="vpm-logo"></a>
			</div>
		</div>

		<?php if ( !is_front_page() ) { ?><div class="twelve columns offset-by-four">
			<nav id="nav" class="row">
				<div id="menus">
					<?php wp_nav_menu( array(
						'menu' => 'primary-menu',
						'container' => 'false'
					)); ?>
					<?php wp_nav_menu( array(
						'menu' => 'secondary-menu',
						'container' => 'false'
					)); ?>
				</div>
			</nav>
		</div><?php } ?>
	</header>