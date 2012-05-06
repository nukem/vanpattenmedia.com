	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article>
			<div id="project-<?php the_ID(); ?>" <?php post_class('article'); ?>>
				<?php vpm_content_header(); ?>
				<div class="row">
					<aside class="five columns omega" id="project-meta">
						<div id="project-meta-inner">
							<p id="project-download-box">
								<a href="http://wordpress.org/extend/plugins/ssl-subdomain-for-multisite/" id="button-download">Download now</a><br>
								<?php
								$release_time_unix = 1335243600;
								$release_time_c = date('c', $release_time_unix);
								$release_time_r = date('r', $release_time_unix);
								?>
								<em id="project-version-info"><strong>Version 1.0</strong> &#8212; Released <time datetime="<?= $release_time_c; ?>"><abbr title="<?= $release_time_r ?>" id="project-fuzzy-release-date"><?php echo fuzzyDate( $release_time_c ); ?></abbr></time></em><br>
								<em id="project-requirements">Requires WordPress 3.3.1 or greater</em>
							</p>
							<p id="project-contribute-box">
								<a href="#contribute" id="button-contribute">Contribute today!</a>
							</p>
							<div id="project-email-signup-box">
								<p><strong>Get notified</strong> when we update Total Slider.</p>
								<p><em>(And never for anything else; <a href="http://staging.vanpattenmedia.com/legal/">we promise</a>.)</em></p>
								<form action="http://vanpattenmedia.us4.list-manage.com/subscribe/post" method="post" id="project-email-signup-form">
									<input type="hidden" name="u" value="093e419717726bf49301d1a62">
									<input type="hidden" name="id" value="ba0b414c68">
									<input type="hidden" name="group[7973][1]" value="true">

									<!-- <label for="MERGE0"><strong>Email Address</strong> <span class="asterisk">*</span>:</label> -->
									<input type="email" autocapitalize="off" autocorrect="off" name="MERGE0" id="MERGE0" size="25" value="" placeholder="email@address.com">

									<!-- <ul class="interestgroup_field" id="interestgroup_field_66257">
										<li class="interestgroup_row">
											<input type="checkbox" id="group_1" name="group[7973][1]" value="1">
											<label for="group_1">Total Slider</label>
										</li>
										<li class="interestgroup_row">
											<input type="checkbox" id="group_2" name="group[7973][2]" value="1">
											<label for="group_2">Rach5</label>
										</li>
									</ul> -->

									<input type="submit" value="Subscribe" id="project-email-subscribe">
								</form>
							</div>
						</div>
					</aside>
					<div class="entry-content" id="project-content">
						<?php the_content(); ?>
					</div>
				</div>
				<div class="row">
					<h3><a name="media"></a>Media</h3>
					<ul id="project-media">
						<li><a href="https://www.youtube.com/watch?v=gfwKjLbk7YU" data-fancybox-group="gallery" class="project-media-item"><img src="http://placehold.it/150x150" alt=""></a></li>
						<li><a href="http://staging.vanpattenmedia.com/content/uploads/2012/05/slider-bg.jpg" data-fancybox-group="gallery" class="project-media-item"><img src="http://placehold.it/150x150" alt=""></a></li>
						<li><a href="http://staging.vanpattenmedia.com/content/uploads/2012/05/slider-bg.jpg" data-fancybox-group="gallery" class="project-media-item"><img src="http://placehold.it/150x150" alt=""></a></li>
						<li><a href="http://staging.vanpattenmedia.com/content/uploads/2012/05/slider-bg.jpg" data-fancybox-group="gallery" class="project-media-item"><img src="http://placehold.it/150x150" alt=""></a></li>
						<li><a href="http://staging.vanpattenmedia.com/content/uploads/2012/05/slider-bg.jpg" data-fancybox-group="gallery" class="project-media-item"><img src="http://placehold.it/150x150" alt=""></a></li>
						<li><a href="http://staging.vanpattenmedia.com/content/uploads/2012/05/slider-bg.jpg" data-fancybox-group="gallery" class="project-media-item"><img src="http://placehold.it/150x150" alt=""></a></li>
						<li><a href="http://staging.vanpattenmedia.com/content/uploads/2012/05/slider-bg.jpg" data-fancybox-group="gallery" class="project-media-item"><img src="http://placehold.it/150x150" alt=""></a></li>
						<li><a href="http://staging.vanpattenmedia.com/content/uploads/2012/05/slider-bg.jpg" data-fancybox-group="gallery" class="project-media-item"><img src="http://placehold.it/150x150" alt=""></a></li>
					</ul>
				</div>
				<div class="row">
					<h3><a name="contribute"></a>Contribute</h3>
					<div class="four columns alpha">Donate</div>
					<div class="four columns">Pull Requests</div>
					<div class="four columns omega">Bug reports and feature requests</div>
				</div>
			</div>
		</article>
	<?php endwhile; else : ?>
		<?php get_template_part('error','404'); ?>
	<?php endif; ?>