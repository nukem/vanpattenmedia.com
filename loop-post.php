<div class="content">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<article>
			<div id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
				<?php vpm_content_header(); ?>
				<p class="info">at <time class="updated" datetime="<?php the_modified_time('c'); ?>" pubdate><strong><?php the_time(); ?></strong> on <strong><?php the_time(get_option('date_format')); ?></strong></time> <span class="byline author vcard">by <strong class="fn"><?php the_author(); ?></strong></span></p>

				<div class="entry-content">
					<?php the_content('<strong>Read more...</strong>'); ?>
				</div>
			</div>
		</article>

		<?php if ( is_single() ) : ?>
		<section id="comments">
			<div id="comments_wrap">
				<?php comments_template(); ?>
			</div>
		</section>
		<?php endif; ?>

	<?php endwhile; ?>

		<section class="posts-nav clearfix">
			<?php if (!is_single()) {
				echo '<div class="prev-posts">'; next_posts_link( '&laquo; Older Posts' ); echo '</div>';
				echo '<div class="next-posts">'; previous_posts_link( 'Newer Posts &raquo;' ); echo '</div>';
			} else {
				next_post_link('<div class="next-posts">%link</div>','%title &raquo;');
				previous_post_link('<div class="prev-posts">%link</div>','&laquo; %title');
			} ?>
		</section>

	<?php else : ?>
		<?php get_template_part('error','404'); ?>
	<?php endif; ?>
</div>