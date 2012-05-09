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
							<div id="project-key-links">
								<h4>Key links</h4>
								<ul>
									<li><a href="<?php the_permalink(); ?>docs">User Docs</a></li>
									<li><a href="https://github.com/<?= get_post_meta($post_id, 'github_slug', true); ?>/wiki">Developer Docs</a></li>
									<li><a href="<?php the_permalink(); ?>license">License</a></li>
								</ul>
							</div>
							<div id="project-email-signup-box">
								<h4>Update Alerts</h4>
								<p>Get notified when we update <?php the_title(); ?>.</p>
								<p><em>(And never for anything else; <a href="http://www.vanpattenmedia.com/legal/">we promise</a>.)</em></p>
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
					<?php
					$project_media = get_post_meta($post->ID, 'project_media', false);

					if ( $project_media ) : ?>
					<h3><a name="media"></a>Media</h3>
					<ul id="project-media">
						<?php foreach ($project_media as $media) {
							if ( preg_match( "/[^\W]\d{2,}/e", $media ) ) {
							// If an image ID
								$media_thmb = wp_get_attachment_image_src($media, 'project-screenshot-thumbnail');
								$media_full = wp_get_attachment_image_src($media, 'full');
								$media_post = get_post( $media, ARRAY_A );

								echo '<li><a href="' . $media_full[0] . '" data-fancybox-group="gallery" class="project-media-item" title="' . $media_post['post_content'] . '"><img src="'. $media_thmb[0] . '" alt="" width="' . $media_thmb[1] . '" height="' . $media_thmb[2] . '"></a></li>';
							} else {
							// If a media URL
								parse_str( parse_url( $media, PHP_URL_QUERY ) );
								$v_id = $v;

								echo '<li><a href="' . $media . '" data-fancybox-group="gallery" class="project-media-item"><img src="http://img.youtube.com/vi/' . $v_id . '/0.jpg" alt=""></a></li>';
							}
						} ?>
					</ul>
					<?php endif; ?>
				</div>
				<div class="row">
					<h3><a name="contribute"></a>Contribute</h3>
					<p><?php the_title(); ?> is <a href="">open source</a>, and thrives when the community supports its development. There are a number of ways you can contribute even if you don't have technical savvy. Below are a few ideas&hellip;</p>
					<ul id="contribute-links">
						<li class="four columns alpha">
							<a class="contribute-link" href="">
								<img class="contribute-icon" src="<?= get_template_directory_uri(); ?>/img/icons/gift.png" alt="">
								<div class="contribute-text">
									<strong>Donate</strong>
									<span>Any amount is appreciated.</span>
								</div>
							</a>
						</li>
						<li class="four columns">
							<a class="contribute-link" href="https://github.com/<?= get_post_meta($post_id, 'github_slug', true); ?>/issues/new">
								<img class="contribute-icon" src="<?= get_template_directory_uri(); ?>/img/icons/bug.png" alt="">
								<div class="contribute-text">
									<strong>Report a bug</strong>
									<span>Found a problem? Let us know!</span>
								</div>
							</a>
						</li>
						<li class="four columns omega">
							<a class="contribute-link" href="https://github.com/<?= get_post_meta($post_id, 'github_slug', true); ?>/issues/new">
								<img class="contribute-icon" src="<?= get_template_directory_uri(); ?>/img/icons/add-idea.png" alt="">
								<div class="contribute-text">
									<strong>Suggest a feature</strong>
									<span>We'd love to hear your ideas!</span>
								</div>
							</a>
						</li>
						<li class="four columns alpha">
							<a class="contribute-link" href="https://github.com/<?= get_post_meta($post_id, 'github_slug', true); ?>/pull/new/master">
								<img class="contribute-icon" src="<?= get_template_directory_uri(); ?>/img/icons/add-code.png" alt="">
								<div class="contribute-text">
									<strong>Contribute code</strong>
									<span>File a pull request on Github.</span>
								</div>
							</a>
						</dliiv>
						<li class="four columns">
							<a class="contribute-link" href="">
								<img class="contribute-icon" src="<?= get_template_directory_uri(); ?>/img/icons/add-translation.png" alt="">
								<div class="contribute-text">
									<strong>Prepare a translation</strong>
									<span>Aiutaci connettersi al mondo.</span>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</article>
	<?php endwhile; else : ?>
		<?php get_template_part('error','404'); ?>
	<?php endif; ?>