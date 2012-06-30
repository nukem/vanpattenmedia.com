<div class="sixteen columns" id="feature-box">
	<h2 id="slogan">Beautiful responsive websites that help your business succeed online so it can flourish offline.</h2>
	<div id="responsive-demo">
		<div id="laptop-demo"><img src="<?php bloginfo('template_directory'); ?>/img/homepage/responsive-screenshots/jeremyyaddaw/laptop.png" alt=""></div>
		<div id="tablet-demo"><img src="<?php bloginfo('template_directory'); ?>/img/homepage/responsive-screenshots/jeremyyaddaw/tablet.png" alt=""></div>
		<div id="smartphone-demo"><img src="<?php bloginfo('template_directory'); ?>/img/homepage/responsive-screenshots/jeremyyaddaw/smartphone.png" alt=""></div>
	</div>
</div>

<div class="twelve columns">
	<section id="featured-quote">
		<blockquote><span>Wow!  It looks so great, Chris!!  I'm so excited! LOVE, LOVE your work on this!</span></blockquote>
		<cite>&mdash; Broadway actress <strong><a href="http://www.susanegan.net/">Susan Egan</a></strong></cite>
	</section>

	<!-- <section class="slider">
		<?php
			// Set up a new WP_Query
			$my_args = array(
				'post_type'		=>	'hslides',
				'orderby'		=>	'menu_order',
				'order'			=>	'ASC'
			);
			vpm_wp_query_slider($my_args, 'top');
		?>
	</section> -->

	<div class="content">
		<!-- <div class="entry-content">
			<br><br><br>
		</div> -->
	</div>
</div>

<div class="four columns" id="nav-wrap">
	<nav id="nav">
		<div id="menus">
			<?php wp_nav_menu( array(
				'menu' => 'primary-menu',
				'container' => 'false'
			)); ?>
		</div>
	</nav>
</div>

<div class="row">
	<section class="one-third column homebox">
		<a href="http://www.vanpattenmedia.com/websites/">
			<div class="slide header-bottom">
				<div>
					<h2>Web design</h2>
				</div>
				<img src="<?php bloginfo('template_directory'); ?>/img/homepage/homeboxes/website.png" alt="">
			</div>
			<p>Beautiful and effective websites for events, ecommerce, startups, or whatever you can dream up.</p>
		</a>
	</section>

	<section class="one-third column homebox">
		<a href="http://www.vanpattenmedia.com/websites/wordpress/">
			<div class="slide header-bottom">
				<div>
					<h2>WordPress</h2>
				</div>
				<img src="<?php bloginfo('template_directory'); ?>/img/homepage/homeboxes/wordpress.jpg" alt="">
			</div>
			<p>Manage your own website with WordPress. Custom-built solutions and managed hosting for your business.</p>
		</a>
	</section>

	<section class="one-third column homebox">
		<a href="http://labs.vanpattenmedia.com/">
			<div class="slide header-bottom">
				<div>
					<h2>Open source</h2>
				</div>
				<img src="<?php bloginfo('template_directory'); ?>/img/homepage/homeboxes/opensource.jpg" alt="">
			</div>
			<p>Free plugins, code modules, themes, and content management tools. Open to contributions.</p>
		</a>
	</section>
</div>