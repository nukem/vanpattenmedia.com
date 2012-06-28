<div class="sixteen columns" id="feature-box">
	<h2 id="slogan">Beautiful responsive websites that help your business succeed online, so it flourishes offline.</h2>
	<div id="responsive-demo">
		<div id="laptop-demo"><img src="<?php bloginfo('template_directory'); ?>/img/homepage/responsive-screenshots/jeremyyaddaw/laptop.png" alt=""></div>
		<div id="tablet-demo"><img src="<?php bloginfo('template_directory'); ?>/img/homepage/responsive-screenshots/jeremyyaddaw/tablet.png" alt=""></div>
		<div id="smartphone-demo"><img src="<?php bloginfo('template_directory'); ?>/img/homepage/responsive-screenshots/jeremyyaddaw/smartphone.png" alt=""></div>
	</div>
</div>

<div class="four columns nav">
	<?php get_sidebar( $base ); ?>
</div>
<div class="twelve columns">
	<section class="slider">
		<?php
			// Set up a new WP_Query
			$my_args = array(
				'post_type'		=>	'hslides',
				'orderby'		=>	'menu_order',
				'order'			=>	'ASC'
			);
			vpm_wp_query_slider($my_args, 'top');
		?>
	</section>

	<div class="content">
		<div class="entry-content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
		</div>

		<div class="row">
			<section class="six columns alpha homebox">
				<a href="http://www.vanpattenmedia.com/websites/wordpress/">
					<div class="slide header-bottom">
						<div>
							<h2>WordPress</h2>
						</div>
						<img src="<?php bloginfo('template_directory'); ?>/img/homepage/homeboxes/wordpress.jpg" alt="">
					</div>
					<p>WordPress websites, tailored to your needs. Custom themes, plugins, architecture, and managed hosting for your business.</p>
				</a>
			</section>

			<section class="six columns omega homebox">
				<a href="http://labs.vanpattenmedia.com/">
					<div class="slide header-bottom">
						<div>
							<h2>Open source</h2>
						</div>
						<img src="<?php bloginfo('template_directory'); ?>/img/homepage/homeboxes/opensource.jpg" alt="">
					</div>
					<p>Free WordPress plugins, PHP modules, theme architectures, and content management apps. Open to contributions. From us to you.</p>
				</a>
			</section>
		</div>
	</div>
</div>