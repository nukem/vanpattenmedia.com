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
		<?php get_template_part('loop', 'page'); ?>
		
		<?php
			
			// What we do
			if ( is_page('portfolio') ) {
				
				echo '<section class="slider">' . "\n";
				echo tab(3) . '<div class="infocus" id="website-portfolio">' . "\n";
				echo tab(4) . '<div class="slide-hold">' . "\n";
				
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
						echo tab(5) . '<div id="post-' . get_the_ID() . '" '; post_class('slide'); echo ' style="background: url(' . get_bloginfo('template_directory') . '/img/timthumb/timthumb.php?src=' . $full_url[0] . '&w=700&f=2|8|8|8|8|8|8|8|8)">' . "\n";
							
								echo tab(6) . '<a href="' . get_permalink() . '">' . "\n";
								
									echo tab(7) . '<h3>' . get_the_title() . '</h3>' . "\n";
									echo tab(7) . '<p>' . word_trim(get_the_excerpt(), 15, true) . '</p>';
									echo tab(7) . '<img class="folio_item-thumb" src="' . $medium_url[0] . '" alt="Screenshot of a website for ' . get_the_title() . '" title="Website for ' . get_the_title() . '">' . "\n";
									
									// Start .folio_item-data
									echo tab(7) . '<div class="folio_item-data">' . "\n";
									
									if ( get_post_meta($post->ID, 'website_url', true) ) {
									   echo tab(8) . '<a href="' . get_post_meta($post->ID, 'website_url', true) . '" class="folio_item-link" rel="nofollow">Visit ' . get_post_meta($post->ID, 'website_nicename', true) . '</a>' . "\n";
									}
									
									echo tab(7) . '</div>' . "\n";
								
								echo tab(6) . '</a>' . "\n";
								
						echo tab(5) . '</div>' . "\n";
					}
				}
				
				echo tab(4) . '</div>' . "\n";
				echo tab(3) . '</div>' . "\n\n";
				
				wp_reset_postdata();
						
			echo tab(3) . '<div class="slide-nav">
				<div class="slide-nav-in">
					<a href="javascript:;" class="slide-prev">Previous</a>
					<a href="javascript:;" class="slide-next">Next</a>
				</div>
			</div>';
		
			echo tab(2) . '</section>' . "\n";
				
			}
		
		?> 
		
		<div id="folio_item-data"></div>
	</section>

<?php get_footer(); ?>
</body>
</html>