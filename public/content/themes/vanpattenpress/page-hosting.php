<div class="sixteen columns"><?php vpm_content_header(); ?></div>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="six columns">
		<div id="notepad"><?php the_content(); ?></div>
	</div>
<?php endwhile; endif; ?>

<div class="ten columns">
	plans
</div>