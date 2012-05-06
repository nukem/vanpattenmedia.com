	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article>
			<div id="project-<?php the_ID(); ?>" <?php post_class('article'); ?>>
				<?php vpm_content_header(); ?>
				<div class="row">
					<div class="four columns omega" id="project-meta">
						<a href="#" class="download-button">Download now</a>
						<em id="version-info"><strong>Version 1.0</strong> &#8212; Requires WordPress 3.3.1 or greater</em>
					</div>
					<div class="entry-content" id="project-content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</article>
	<?php endwhile; else : ?>
		<?php get_template_part('error','404'); ?>
	<?php endif; ?>