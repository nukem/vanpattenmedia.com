	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article>
			<div id="project-<?php the_ID(); ?>" <?php post_class('article'); ?>>
				<?php vpm_content_header(); ?>
				<div class="row">
					<div class="four columns omega" id="project-meta">
						<p><a href="http://wordpress.org/extend/plugins/ssl-subdomain-for-multisite/" id="button-download">Download now</a></p>
						<p><em id="project-version-info"><strong>Version 1.0</strong> &#8212; Released <time datetime="2012-04-28T20:00Z"><abbr title="Saturday, April 28, 2012 at 20:00 UTC" id="project-fuzzy-release-date">one week ago</abbr></time></em></p>
						<p><em id="project-requirements">Requires WordPress 3.3.1 or greater</em></p>
						<p><a href="#contribute" id="button-contribute">Contribute today!</a></p>
					</div>
					<div class="entry-content" id="project-content">
						<?php the_content(); ?>
					</div>
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