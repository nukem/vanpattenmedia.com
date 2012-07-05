<?php $base = rach5_template_base(); ?><!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<?php get_template_part('head'); ?>
<body <?php body_class(); ?>>
	<?php get_header( $base ); ?>
	<div id="main-container">
		<div class="container">
			<div class="twelve columns">
				<?php include rach5_template_path(); ?>
			</div>
			<div class="four columns nav">
				<?php get_sidebar( $base ); ?>
			</div>
		</div>
	</div>
	<?php get_footer( $base ); ?>
</body>
</html>