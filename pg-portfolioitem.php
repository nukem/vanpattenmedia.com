<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
?><article>
	<div id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
		<?php
		if ( get_post_meta($post->ID, 'website_url', true) ) {
			echo '<a href="' . get_post_meta($post->ID, 'website_url', true) . '" class="folio_item-link" rel="nofollow">Visit ' . get_post_meta($post->ID, 'website_nicename', true) . '</a>' . "\n";
		}
		?>
		<h2><?php the_title(); ?></h2>
		<div class="entry-content">
			<?php the_content('Read More &raquo;'); ?>
		</div>
	</div>
</article><?php endwhile; else :
?><h2>Sorry...</h2>
<p>No posts were found.</p>
<?php endif; ?>

<section class="slider">
	<div class="infocus" id="folio_full">
		<div class="slide-hold">
<?php
		// Get the post thumbnail
		$image_id = get_post_thumbnail_id();
		$full_url = wp_get_attachment_image_src($image_id, 'website-screenshot');

		// Output all the things!
		echo '<div class="slide">' . "\n";
			echo '<img src="' . $full_url[0] . '" alt="Screenshot of a website for ' . get_the_title() . '" title="Website for ' . get_the_title() . '">' . "\n";
		echo '</div>' . "\n";

		if ( get_field('screenshots') ) {
			while ( the_repeater_field('screenshots') ) {
				$image_id = get_sub_field('screenshot');
				$full_url = wp_get_attachment_image_src($image_id, 'website-screenshot');

				echo '<div class="slide">' . "\n";
					echo '<img src="' . $full_url[0] . '" alt="Screenshot of a website for ' . get_the_title() . '" title="Website for ' . get_the_title() . '">' . "\n";
				echo '</div>' . "\n";
			}
		}

		?>
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
<?php
$posttags = get_the_tags();
if ($posttags) {
	echo '<section id="folio_item-tech_used">' . "\n";
	echo '<h4>Built with...</h4>' . "\n";
	echo '<ul>';
	foreach($posttags as $tag) {
		if ( $tag->name == 'Rach5' ) {
			echo '<li><a href="http://labs.vanpattenmedia.com/projects/rach5/">' . $tag->name . '</a></li>' . "\n";
		} elseif ( $tag->name == 'WordPress' ) {
			echo '<li><a href="' . get_bloginfo('url') . '/how/websites/#wordpress">' . $tag->name . '</a></li>' . "\n";
		} else {
			echo '<li>' . $tag->name . '</li>' . "\n";
		}
	}
	echo '</ul>' . "\n";
	echo '</section>' . "\n";
}


// Get current category
$the_category = get_the_category();
foreach ($the_category as $category) {
	$cat_ID = $category->cat_ID;
}

// Related posts
$args = array(
	'post_type'		=>	'post',
	'cat'			=>	$cat_ID,
	'orderby'		=>	'date',
	'order'			=>	'DESC',
	'posts_per_page'=>	3
);

$related_posts = new WP_Query( $args );

if ( $related_posts->have_posts() ) {

	echo '<section id="folio_item-related">' . "\n";

	echo '<h4>Related Items</h4>' . "\n";
	echo '<ul class="related_posts">' . "\n";

	while ( $related_posts->have_posts() ) {
		$related_posts->the_post();

		// Output all the things (AGAIN!)
		echo '<li>' . "\n";
		echo '<a href="' . get_permalink() . '" title="Go to ' . get_the_title() . '">' . get_the_title() . '</a>' . "\n";
		echo '<p>' . wp_trim_words(get_the_excerpt(), 10) . '</p>' . "\n";
		echo '</li>' . "\n";
	}

	echo '</ul>' . "\n";

	echo '</section>' . "\n";
}

wp_reset_postdata();

?>
</div>