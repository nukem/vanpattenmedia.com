<div class="sixteen columns"><?php vpm_content_header(); ?></div>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="six columns">
		<div id="notepad"><?php the_content(); ?></div>
	</div>
<?php endwhile; endif; ?>

<div class="ten columns">
	<div class="two columns alpha">Features</div>
	<div class="two columns">Old</div>
	<div class="two columns">Lite</div>
	<div class="two columns">Pro</div>
	<div class="two columns omega">Enterprise</div>
</div>