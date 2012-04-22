	<header id="header">
		<span id="weare">We are</span><a href="<?php echo home_url(); ?>" id="logo"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="Van Patten Media logo" id="vpm-logo"></a><?php if ( !is_front_page() ) { ?>

		<div id="nav-wrapper">
			<nav id="nav">
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