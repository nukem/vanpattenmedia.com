<?php vpm_content_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="seven columns">
		<div id="notepad"><?php the_content(); ?></div>
	</div>
<?php endwhile; endif; ?>

<div class="nine columns">
	plans
</div>