	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article>
			<div id="page-<?php the_ID(); ?>" <?php post_class('article'); ?>>
				<?php vpm_content_header(); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</div>
		</article>
	<?php endwhile; else : ?>
		<?php get_template_part('error','404'); ?>
	<?php endif; ?>