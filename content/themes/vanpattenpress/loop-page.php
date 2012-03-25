<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
		<article>
			<div id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
				<h2><?php the_title(); ?></h2>
				<div class="entry-content">
					<?php the_content('Read More &raquo;'); ?>
				</div>
			</div>
		</article>
	<?php endwhile; else : ?>
		<h2>Sorry...</h2>
		<p>No posts were found.</p>
	<?php endif; ?>