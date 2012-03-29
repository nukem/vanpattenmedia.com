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
	
		<section class="slider">
			<div class="infocus">
				<div class="slide-hold">
					<?php
					// Set up a new WP_Query
					$args = array(
						'post_type'		=>	'hslides',
						'orderby'		=>	'menu_order',
						'order'			=>	'ASC'
					);
					$instructors = new WP_Query( $args );
					
					// Start the loop
					if ($instructors->have_posts()) : while ($instructors->have_posts()) : $instructors->the_post();
					
					// Get the post thumbnail
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id, 'focus');
					$image_url = $image_url[0];
					
					// Output all the things
					?><div id="post-<?= get_the_ID() ?>" class="slide" style="background-image: url(<?= $image_url ?>);">
						<a href="<?= get_post_meta($post->ID, 'home_slide_url', true) ?>">
							<h3><?= get_the_title() ?></h3>
							<p><?= get_the_excerpt() ?></p>
						</a>
					</div>
					<?php
					// End the loop
					endwhile; endif;
					?>
					
				</div>
			</div>
			
			<?php
				// Reset the loop
				wp_reset_postdata();
			?>
		
			<div class="slide-nav">
				<div class="slide-nav-in">
					<a href="javascript:;" class="slide-prev">Previous</a>
					<a href="javascript:;" class="slide-next">Next</a>
				</div>
			</div>
				
		</section>
	
		<div class="entry-content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
		</div>
		
		<div class="clearfix home-boxes">
			<div class="alpha">Hi</div>
			<div class="omega">Hi</div>
		</div>
	</section>

<?php get_footer(); ?>
</body>
</html>