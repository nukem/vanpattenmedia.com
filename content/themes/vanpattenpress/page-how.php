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
	
		<section class="slider">
			<?php
			
			// What we do
			if ( is_page(10) ) {
				
				echo '<div class="infocus">' . "\n";
				echo tab(4) . '<div class="slide-hold">' . "\n";
				
				$args = array(
					'post_parent'	=>	10,
					'post_type'		=>	'page',
					'orderby'		=>	'menu_order',
					'order'			=>	'ASC'
				);
				
				$methods = new WP_Query( $args );
				
				if ( $methods->have_posts() ) {
					while ( $methods->have_posts() ) {
						$methods->the_post();
						
						// Get the post thumbnail
						$image_id = get_post_thumbnail_id();  
						$image_url = wp_get_attachment_image_src($image_id, 'focus');  
						$image_url = $image_url[0];  
						
						// Output all the things
						echo tab(5) . '<div id="post-' . get_the_ID() . '" class="slide" style="background-image: url(' . $image_url . ');">' . "\n";
							echo tab(6) . '<a href="' . get_permalink() . '">' . "\n";
								echo tab(7) . '<h3>' . get_the_title() . '</h3>' . "\n";
								echo tab(7) . '<p>' . get_the_excerpt() . '</p>' . "\n";
							echo tab(6) . '</a>' . "\n";
						echo tab(5) . '</div>' . "\n";
					}
				}
				
				echo tab(4) . '</div>' . "\n";
				echo tab(3) . '</div>' . "\n";
					
				wp_reset_postdata();
					
			echo tab(3) . '<div class="slide-nav">
				<div class="slide-nav-in">
					<a href="javascript:;" class="slide-prev">Previous</a>
					<a href="javascript:;" class="slide-next">Next</a>
				</div>
			</div>';
			
		}
	
	?> 
		</section>
	
	</section>

<?php get_footer(); ?>
</body>
</html>