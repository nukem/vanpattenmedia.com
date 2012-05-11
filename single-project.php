<?php

if ( $post->post_parent ) {
	$post_id = $post->post_parent;
} else {
	$post_id = $post->ID;
}

$post_thumb_id  = get_post_thumbnail_id( $post_id );
$post_thumb_url = wp_get_attachment_image_src($post_thumb_id, 'focus');

	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article>
			<div id="project-<?php the_ID(); ?>" <?php post_class('article'); ?>>
				<?php if ( $post->post_parent ) : ?>
					<div class="slide header-bottom">
						<div>
							<h2><a href="<?= get_permalink($post->post_parent); ?>"><?= get_the_title($post->post_parent); ?></a> &rsaquo; <?php the_title(); ?></h2>
						</div>
						<img src="<?= $post_thumb_url[0]; ?>" alt="">
					</div>
				<?php else : ?>
					<?php vpm_content_header(); ?>
				<?php endif; ?>
				<div class="row">
					<aside class="five columns omega" id="project-meta">
						<div id="project-meta-inner">
							<p id="project-download-box">
								<a href="<?= get_post_meta($post_id, 'project_download_url', true); ?>" id="button-download" onClick="recordOutboundLink(this, 'Project Download', 'wordpress.org');return false;">Download now</a><br>
								<?php
								$release_time_unix = get_post_meta($post_id, 'project_release_unix_time', true);
								$release_time_c = date('c', $release_time_unix);
								$release_time_r = date('r', $release_time_unix);
								?>
								<em id="project-version-info"><strong>Version <?= get_post_meta($post_id, 'project_version_number', true); ?></strong> &#8212; Released <time datetime="<?= $release_time_c; ?>"><abbr title="<?= $release_time_r ?>" id="project-fuzzy-release-date"><?php echo fuzzyDate( $release_time_c ); ?></abbr></time></em><br>
								<em id="project-requirements">Requires WordPress 3.3.1 or greater</em>
							</p>
							<p id="project-contribute-box">
								<?php if ( $post->post_parent ) : ?>
									<a href="<?= get_permalink($post->post_parent); ?>#contribute" id="button-contribute">Contribute today!</a>
								<?php else : ?>
									<a href="#contribute" id="button-contribute">Contribute today!</a>
								<?php endif; ?>
							</p>
							<?php if ( !$post->post_parent ) : ?>
							<div id="project-key-links">
								<h4>Key links</h4>
								<ul>
									<li><a href="<?php the_permalink(); ?>docs">User Docs</a></li>
									<li><a href="https://github.com/<?= get_post_meta($post_id, 'project_github_slug', true); ?>/wiki">Developer Docs</a></li>
									<li><a href="<?php the_permalink(); ?>license">License</a></li>
								</ul>
							</div>
							<div id="project-email-signup-box">
								<h4>Update Alerts</h4>
								<p>Get notified when we release a new version of <?php the_title(); ?>.</p>
								<p><em>(And never for anything else; <a href="http://www.vanpattenmedia.com/legal/">we promise</a>.)</em></p>
								<form action="http://vanpattenmedia.us4.list-manage.com/subscribe/post" method="post" id="project-email-signup-form">
									<input type="hidden" name="u" value="093e419717726bf49301d1a62">
									<input type="hidden" name="id" value="ba0b414c68">
									<input type="hidden" name="<?= get_post_meta($post_id, 'project_mailchimp_group', true); ?>" value="true">

									<input type="email" autocapitalize="off" autocorrect="off" name="MERGE0" id="MERGE0" size="25" value="" placeholder="email@address.com">

									<input type="submit" value="Subscribe" id="project-email-subscribe">
								</form>
							</div>
							<?php endif; ?>
						</div>
					</aside>
					<div class="entry-content" id="project-content">
						<?php the_content(); ?>
					</div>
				</div>
				<?php if ( !$post->post_parent ) : ?>
				<div class="row">
					<?php
					$project_media = get_post_meta($post_id, 'project_media', false);

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
					<h3><a name="contribute"></a><a name="translate"></a>Contribute</h3>
					<p><?php the_title(); ?> is <a href="">open source</a>, and thrives when the community supports its development. There are a number of ways you can contribute even if you don't have technical savvy. Below are a few ideas&hellip;</p>
					<ul id="contribute-links">
						<li class="four columns alpha">
							<a class="contribute-link project-media-item" href="#project-donate">
								<img class="contribute-icon" src="<?= get_template_directory_uri(); ?>/img/icons/gift.png" alt="">
								<div class="contribute-text">
									<strong>Donate</strong>
									<span>Any amount is appreciated.</span>
								</div>
							</a>
							<div id="project-donate" style="display: none;">
								<h3>Donate to <?php the_title(); ?></h3>
								<p>As a free and <a href="">open source</a> project, <?php the_title(); ?> does not regularly make its development team money. But if you feel compelled to contribute and are not able (or do not have the time) to code or prepare a translation, a financial donation is a great way to show your support.</p>
								<p>Donations go directly to the developers of each project (minus PayPal fees). Van Patten Media does not take any cut.</p>

								<div id="project-donate-buttons" class="clearfix">
									<?php // $5.00 button
									?><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=<?= get_post_meta($post_id, 'project_paypal_button_id_5', true); ?>" id="project-donate-5">Donate $5</a>

									<?php // $10.00 button
									?><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=<?= get_post_meta($post_id, 'project_paypal_button_id_10', true); ?>" id="project-donate-10">Donate $10</a>

									<?php // Custom amount button
									?><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=<?= get_post_meta($post_id, 'project_paypal_button_id_custom', true); ?>" id="project-donate-custom">Donate a custom amount</a>
								</div>

								<div id="project-donate-payment-info" class="clearfix">
									<div id="project-donate-paypal-message">Donate safely with <a href="https://www.paypal.com/" id="paypal"><img src="<?= get_template_directory_uri(); ?>/img/paypal.png" alt="PayPal" title="PayPal" id="project-donate-paypal-logo"></a></div>
									<ul id="project-donate-payment-cards">
										<li><img src="<?= get_template_directory_uri(); ?>/img/icons/cards/generic.png" alt="Debit"></li>
										<li><img src="<?= get_template_directory_uri(); ?>/img/icons/cards/amex.png" alt="American Express"></li>
										<li><img src="<?= get_template_directory_uri(); ?>/img/icons/cards/discover.png" alt="Discover"></li>
										<li><img src="<?= get_template_directory_uri(); ?>/img/icons/cards/mastercard.png" alt="Mastercard"></li>
										<li><img src="<?= get_template_directory_uri(); ?>/img/icons/cards/visa.png" alt="Visa"></li>
									</ul>
								</div>
							</div>
						</li>
						<li class="four columns">
							<a class="contribute-link" href="https://github.com/<?= get_post_meta($post_id, 'project_github_slug', true); ?>/issues?direction=desc&sort=open&state=open">
								<img class="contribute-icon" src="<?= get_template_directory_uri(); ?>/img/icons/bug.png" alt="">
								<div class="contribute-text">
									<strong>Report a bug</strong>
									<span>Found a problem? Let us know!</span>
								</div>
							</a>
						</li>
						<li class="four columns omega">
							<a class="contribute-link" href="https://github.com/<?= get_post_meta($post_id, 'project_github_slug', true); ?>/issues?direction=desc&sort=open&state=open">
								<img class="contribute-icon" src="<?= get_template_directory_uri(); ?>/img/icons/add-idea.png" alt="">
								<div class="contribute-text">
									<strong>Suggest a feature</strong>
									<span>We'd love to hear your ideas!</span>
								</div>
							</a>
						</li>
						<li class="four columns alpha">
							<a class="contribute-link" href="https://github.com/<?= get_post_meta($post_id, 'project_github_slug', true); ?>/pull/new/master">
								<img class="contribute-icon" src="<?= get_template_directory_uri(); ?>/img/icons/add-code.png" alt="">
								<div class="contribute-text">
									<strong>Contribute code</strong>
									<span>File a pull request on Github.</span>
								</div>
							</a>
						</dliiv>
						<li class="four columns">
							<a class="contribute-link" href="<?= get_permalink(); ?>translate/">
								<img class="contribute-icon" src="<?= get_template_directory_uri(); ?>/img/icons/add-translation.png" alt="">
								<div class="contribute-text">
									<strong>Prepare a translation</strong>
									<span>Aiutaci connettersi al mondo.</span>
								</div>
							</a>
						</li>
					</ul>
				</div>
				<?php endif; ?>
			</div>
		</article>
	<?php endwhile; else : ?>
		<?php get_template_part('error','404'); ?>
	<?php endif; ?>