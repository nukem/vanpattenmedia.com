<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<?php get_template_part('head'); ?> 
<body <?php body_class(); ?>>
<?php get_header(); ?> 
	
	<section id="content">
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
				echo tab(4) . '<div class="slide">' . "\n";
					echo tab(5) . '<img src="' . $full_url[0] . '" alt="Screenshot of a website for ' . get_the_title() . '" title="Website for ' . get_the_title() . '">' . "\n";
				echo tab(4) . '</div>' . "\n";
			
				if ( get_field('screenshots') ) {
					while ( the_repeater_field('screenshots') ) {
						$image_id = get_sub_field('screenshot');  
						$full_url = wp_get_attachment_image_src($image_id, 'website-screenshot');
					
						echo tab(4) . '<div class="slide">' . "\n";
							echo tab(5) . '<img src="' . $full_url[0] . '" alt="Screenshot of a website for ' . get_the_title() . '" title="Website for ' . get_the_title() . '">' . "\n";
						echo tab(4) . '</div>' . "\n";
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
			echo tab(3) . '<section id="folio_item-tech_used">' . "\n";
			echo tab(4) . '<h4>Built with...</h4>' . "\n";
			echo tab(4) . '<ul>';
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
			echo tab(3) . '</section>' . "\n";
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
			
			echo tab(3) . '<section id="folio_item-related">' . "\n";
			
			echo tab(4) . '<h4>Related Items</h4>' . "\n";
			echo tab(4) . '<ul class="related_posts">' . "\n";
			
			while ( $related_posts->have_posts() ) {
				$related_posts->the_post(); 
				
				// Output all the things (AGAIN!)
				echo tab(5) . '<li>' . "\n";
				echo tab(6) . '<a href="' . get_permalink() . '" title="Go to ' . get_the_title() . '">' . get_the_title() . '</a>' . "\n";
				echo tab(6) . '<p>' . word_trim(get_the_excerpt(), 10, true) . '</p>' . "\n";
				echo tab(5) . '</li>' . "\n";
			}
			
			echo tab(4) . '</ul>' . "\n";
			
			echo tab(3) . '</section>' . "\n";
		}
		
		wp_reset_postdata();
		
		?>
		</div>
	</section>

<?php get_footer(); ?>
</body>
</html>