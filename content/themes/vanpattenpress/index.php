<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<?php get_template_part('head'); ?> 
<body <?php body_class(); ?>>
<?php get_header(); ?> 
	
	<section id="content"><?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<article>
			<div id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
				<h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2> 
				<p class="info">at <time class="updated" datetime="<?php the_modified_time('c'); ?>" pubdate><strong><?php the_time(); ?></strong> on <strong><?php the_time(get_option('date_format')); ?></strong></time> <span class="byline author vcard">by <strong class="fn"><?php the_author(); ?></strong></span></p>
				
				<div class="entry-content">
					<?php the_content('<strong>Read more...</strong>'); ?>
				</div>
			</div>
		</article>
			
	<?php endwhile; ?>
			
		<section>
			<div class="posts-nav">
				<span class="next-posts"><?php next_posts_link( 'Older Posts' ) ?></span>
				<span class="previous-posts"><?php previous_posts_link( 'Newer Posts' ) ?></span>
			</div>
		</section>
			
	<?php else : ?>
		
		<h2>Sorry...</h2>
		<p>No posts were found.</p>
			
	<?php endif; ?></section>

<?php get_footer(); ?>
</body>
</html>