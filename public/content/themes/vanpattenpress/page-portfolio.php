<?php get_template_part('loop', 'page'); ?>

<?php

	// What we do
	if ( is_page('portfolio') ) {

		echo '<section class="slider">' . "\n";
		echo '<div class="infocus" id="website-portfolio">' . "\n";
		echo '<div class="slide-hold">' . "\n";

		$args = array(
			'post_type'		=>	'portfolio',
			'orderby'		=>	'menu_order',
			'order'			=>	'ASC'
		);

		$portfolio = new WP_Query( $args );

		if ( $portfolio->have_posts() ) {
			while ( $portfolio->have_posts() ) {
				$portfolio->the_post();

				// Get the post thumbnail
				$image_id = get_post_thumbnail_id();
				$full_url = wp_get_attachment_image_src($image_id, 'website-screenshot');
				$medium_url = wp_get_attachment_image_src($image_id, 'medium');

				$the_category = get_the_category();

				foreach ($the_category as $category) {
					$cat_ID = $category->cat_ID;
				}
				// Output all the things!
				echo '<div id="slide-' . get_the_ID() . '" '; post_class('slide header-top'); echo ' style="background: url(/img/e:grayblur/b:8/w:700/' . preg_replace('#^http://#i', '', $full_url[0]) . ')">' . "\n";

						echo '<a href="' . get_permalink() . '">' . "\n";

							echo '<h2>' . get_the_title() . '</h2>' . "\n";
							echo '<p>' . wp_trim_words(get_the_excerpt(), 15) . '</p>';
							echo '<img class="folio_item-thumb" src="' . $medium_url[0] . '" alt="Screenshot of a website for ' . get_the_title() . '" title="Website for ' . get_the_title() . '">' . "\n";

							// Start .folio_item-data
							echo '<div class="folio_item-data">' . "\n";

							if ( get_post_meta($post->ID, 'website_url', true) ) {
							   echo '<a href="' . get_post_meta($post->ID, 'website_url', true) . '" class="folio_item-link" rel="nofollow">Visit ' . get_post_meta($post->ID, 'website_nicename', true) . '</a>' . "\n";
							}

							echo '</div>' . "\n";

						echo '</a>' . "\n";

				echo '</div>' . "\n";
			}
		}

		echo '</div>' . "\n";
		echo '</div>' . "\n\n";

		wp_reset_postdata();

	echo '<div class="slide-nav">
		<div class="slide-nav-in">
			<a href="javascript:;" class="slide-prev">Previous</a>
			<a href="javascript:;" class="slide-next">Next</a>
		</div>
	</div>';

	echo '</section>' . "\n";

	}

?>

<div id="folio_item-data" style="margin-bottom: 20px;"></div>
