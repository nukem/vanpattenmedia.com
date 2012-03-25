	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=218592368152163";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	
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