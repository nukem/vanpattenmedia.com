<nav id="nav">
	<?php if ( is_home() || is_single() ) : ?>
	<h4>Featured Articles</h4>
	<ul id="blog-features">
	<?php
	$featured = new WP_Query( array( 'tag' => 'blog-feature', 'posts_per_page' => 3 ) );		
	while ( $featured->have_posts() ) : $featured->the_post();

	// Grab the post_thumbnail
	$post_thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'focus');
	?>
		<li><a href="<?= get_permalink() ?>" style="background-image: url(<?= $post_thumb_url[0] ?>);"><div><?= get_the_title() ?></div></a></li>
	<?php endwhile; wp_reset_postdata(); ?>
	</ul>
	<?php endif; ?>
	<div id="menus">
		<h4>Navigate</h4>
		<?php wp_nav_menu( array(
			'menu' => 'primary-menu',
			'container' => 'false'
		)); ?>
	</div>
</nav>
