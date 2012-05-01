<?php $base = app_template_base(); ?><!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<?php get_template_part('head'); ?>
<body <?php body_class(); ?>>
	<div class="container">
		<?php get_header(); ?>

		<div class="four columns nav">
			<?php get_sidebar(); ?>
		</div>
		<div class="twelve columns">
			<?php include app_template_path(); ?>
		</div>

		<?php get_footer(); ?>
	</div>
</body>
</html>