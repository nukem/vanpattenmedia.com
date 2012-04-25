<?php if ( !is_front_page() ) { ?><nav id="nav">
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
</nav><?php } ?>