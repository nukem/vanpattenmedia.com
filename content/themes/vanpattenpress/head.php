<head>
	<meta charset="UTF-8">
	<title><?php wp_title(''); ?></title>
	
	<?php /* Credits */ 
	?><link rel="author" href="/humans.txt">
	
	<?php /* CSS (see inc/rach5-functions.php for options) */
		stylesheet_link_tag('/global.css', true, 0, true);
		
		// Google Web Fonts: Signika Negative
		stylesheet_link_tag('http://fonts.googleapis.com/css?family=Signika+Negative:300,600', false, 1, true);
		
		// Google Web Fonts: Open Sans
		stylesheet_link_tag('http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700', false, 1, true);
		
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
		.script('http://cdn.vanpattenmedia.com/js/libs/formalize/js/jquery.formalize.min.js').wait()
		.script('<?php bloginfo('template_directory'); ?>/js/script.js').wait();
	</script>
	
	<?php /* WordPress head */
		wp_head();
	?>
	
	<?php /* Google Analytics */ 
	?><script type="text/javascript">
		var _gaq = _gaq || [];
		// _gaq.push(['_setAccount', 'UA-575101-19']);
		// _gaq.push(['_setDomainName', 'vanpattenmedia.com']);
		_gaq.push(['_trackPageview']);
		
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
</head>