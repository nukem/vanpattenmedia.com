<head>
	<meta charset="UTF-8">
	<title><?php wp_title(''); ?></title>
	
	<?php /* Credits */ 
	?><link rel="author" href="/humans.txt">
	
	<?php /* CSS (see inc/rach5.php for options) */
		stylesheet_link_tag('/global.css', true, 0, true);
		
		// Google Web Fonts: Signika Negative
		stylesheet_link_tag('http://fonts.googleapis.com/css?family=Signika+Negative:300,600', false, 1, true);
		
		// Formalize
		stylesheet_link_tag('http://cdn.vanpattenmedia.com/js/libs/formalize/css/formalize.css', false, 1, false);
	?> 
	
	<?php /* Viewport for mobile */ 
	?><meta name="viewport" content="width=device-width; initial-scale=1.0">
	
	<?php /* JavaScript Fun For Everyone! */ 
	?><!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script type="text/javascript" src="http://cdn.vanpattenmedia.com/js/libs/LAB.min.js"></script>
	<script type="text/javascript">
		$LAB
		.script('http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js').wait()
		// .script('http://cdn.vanpattenmedia.com/js/libs/jquery.cycle.min.js').wait()
		.script('<?php bloginfo('template_directory'); ?>/js/libs/waypoints.min.js').wait()
		.script('http://cdn.vanpattenmedia.com/js/libs/formalize/js/jquery.formalize.min.js').wait()
		// .script('http://cdn.vanpattenmedia.com/js/libs/jquery.scrollTo.min.js').wait()
		.script('<?php bloginfo('template_directory'); ?>/js/script.js').wait();
	</script>
	
	<?php /* WordPress head */
		wp_head();
	?>
	
	<?php /* OpenGraph */ 
	?><meta property="og:locale" content="en_US">
	<meta property="fb:admins" content="1366500013">
	<meta property="og:title" content="<?php wp_title(''); ?>">
	<meta property="og:url" content="<?php echo get_permalink(); ?>">
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
	<meta property="og:type" content="<?php if ( is_single() ) { echo 'article'; } else { echo 'website'; } ?>">
	<meta property="og:description" content="<?php if ( !is_front_page() ) :
		echo wp_trim_words(rach5_get_the_excerpt(), 20);
	else : 
		echo 'We help artists succeed online so they can flourish offline. Take control of your digital presence so you can focus on the good stuff: honing your craft and connecting with fans.';
	endif; ?>">
	<meta property="og:image" content="<?php
		
	if ( get_post_thumbnail_id() ) {
		$image_id = get_post_thumbnail_id();
		$image_url = wp_get_attachment_image_src($image_id,'large', true);
		echo home_url() . $image_url[0];
	} else {
		echo home_url() . get_bloginfo('template_directory') . '/img/opengraph.png';
	} ?>">
	
	<?php /* Google Analytics */ 
	?><script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-575101-19']);
		_gaq.push(['_setDomainName', 'vanpattenmedia.com']);
		_gaq.push(['_trackPageview']);
		
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
</head>