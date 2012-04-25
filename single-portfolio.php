<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article>
	<div id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
		<?php if ( get_post_meta($post->ID, 'website_url', true) ) : ?>
		<a href="<?= get_post_meta($post->ID, 'website_url', true); ?>" class="folio_item-link" rel="nofollow">Visit <?= get_post_meta($post->ID, 'website_nicename', true); ?></a>
		<?php endif; ?>
		<h2><?php the_title(); ?></h2>
		<div class="entry-content">
			<?php the_content('Read More &raquo;'); ?>
		</div>
	</div>
</article>
<?php endwhile; else : ?>
	<?php get_template_part('error', '404'); ?>
<?php endif; ?>

<section class="slider">
	<div class="infocus" id="folio_full">
		<div class="slide-hold">
		<?php $full_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'website-screenshot'); ?>
			<div class="slide">
				<img src="<?= $full_url[0]; ?>" alt="Screenshot of a website for <?= get_the_title() ?>" title="Website for <?= get_the_title() ?>">
			</div>
		<?php if ( get_field('screenshots') ) : while ( the_repeater_field('screenshots') ) : ?>
			<?php $full_url = wp_get_attachment_image_src(get_sub_field('screenshot'), 'website-screenshot'); ?>
			<div class="slide">
				<img src="<?= $full_url[0]; ?>" alt="Screenshot of a website for <?= get_the_title(); ?>" title="Website for <?= get_the_title(); ?>">
			</div>
		<?php endwhile; endif; ?>
		</div>
	</div>
	<div class="slide-nav">
		<div class="slide-nav-in">
			<a href="javascript:;" class="slide-prev">Previous</a>
			<a href="javascript:;" class="slide-next">Next</a>
		</div>
	</div>
</section>

<div id="folio_item-info" class="entry-content clearfix">
	<?php $posttags = get_the_tags(); if ($posttags) : ?>
	<section id="folio_item-tech_used">
		<h4>Built with...</h4>
		<ul>
		<?php foreach($posttags as $tag) : ?>

			<?php if ( $tag->name == 'Rach5' ) : ?>
				<li><a href="http://labs.vanpattenmedia.com/projects/rach5/"><?= $tag->name; ?></a></li>
			<?php elseif ( $tag->name == 'WordPress' ) : ?>
				<li><a href="<?= get_bloginfo('url'); ?>/how/websites/#wordpress"><?= $tag->name; ?></a></li>
			<?php else : ?>
				<li><?= $tag->name; ?></li>
			<?php endif; ?>

		<?php endforeach; ?>
		</ul>
	</section>
	<?php endif; ?>

	<?php
	// Get current category
	$the_category = get_the_category();
	foreach ($the_category as $category) {
		$cat_ID = $category->cat_ID;
	}

	// Related posts
	$related_posts = new WP_Query( array(
		'post_type'		=>	'post',
		'cat'			=>	$cat_ID,
		'orderby'		=>	'date',
		'order'			=>	'DESC',
		'posts_per_page'=>	3
	) );

	if ( $related_posts->have_posts() ) : ?>
	<section id="folio_item-related">
		<h4>Related Items</h4>
		<ul class="related_posts">
		<?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
			<li>
				<a href="<?= get_permalink(); ?>" title="Go to <?= get_the_title(); ?>"><?= get_the_title(); ?></a>
				<p><?= wp_trim_words(get_the_excerpt(), 10); ?></p>
			</li>
		<?php endwhile; ?>
		</ul>
	</section>
	<?php endif; wp_reset_postdata(); ?>
</div>