<?php

if ( !function_exists('rach5_info') ) {
	function no_rach5() {
		echo '<div class="error">';
		echo '<p>', sprintf(__('You need to <a href="%s">install the Rach5 plugin</a>.', 'rach5'), admin_url('plugin-install.php?tab=upload') ), '</p>';
		echo '</div>';
	}
	add_action('admin_notices', 'no_rach5');
}

// ------------------------------------------------------------ //
//
//    VanPattenMedia.com custom functions
//
// ------------------------------------------------------------ //

function vpmp_setup() {
	// Editor style
	add_theme_support('editor_style');
	add_editor_style('css/editor-style.css?' . time());

	// Register Menus
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' ),
			'secondary-menu' => __( 'Secondary Menu' )
		)
	);

	// Page excerpts
	add_post_type_support( 'page', 'excerpt' );

	// Post excerpts
	add_post_type_support( 'post', 'excerpt' );

	// Post thumbnails
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );

		// Focus thumbnail size
		// set_post_thumbnail_size( 700, 230, true );
	}

	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'focus', 700, 230, true );
		add_image_size( 'website-screenshot', 700, 525, true );
	}
}
add_action('after_setup_theme', 'vpmp_setup');

add_image_size( 'project-screenshot-thumbnail', 106, 80, true );

// Content width
if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

// Remove items from the menu bar
function my_admin_bar_remove() {
	global $wp_admin_bar;

	$wp_admin_bar->remove_node('wp-logo');
	$wp_admin_bar->remove_node('wpseo-menu');
}
add_action('wp_before_admin_bar_render', 'my_admin_bar_remove');

// Turn breadcrumbs on or off
$breadcrumbs = 'off';

// WP title fanciness
function vpm_custom_title() {
	$separator = ' - ';

	// Check for a slogan, and make sure it's not set to the default
	if ( (get_bloginfo('description') != 'Just another WordPress site') ) {
		$theslogan = ': ' . get_bloginfo('description');
	} else { $theslogan = ''; }

	// Some title conditionals
	if ( is_front_page() ) {
		$thetitle = get_bloginfo('name');
	} elseif ( is_page() ) {
		$thetitle = get_the_title() . $separator . get_bloginfo('name');
	} elseif ( is_single() ) {
		$thetitle = get_the_title() . $separator . get_bloginfo('name');
	} elseif ( is_archive() ) {
		$thetitle = post_type_archive_title('', false) . $separator . get_bloginfo('name');;
	} elseif ( is_home() ) {
		$thetitle = 'Blog' . $separator . get_bloginfo('name');
	} else {
		$thetitle = get_bloginfo('name');
	}

	// For SEO, we check if it's less than 70 before we tack on your slogan.
	// (change if you dare...)
	if ( ( strlen($theslogan) + strlen($thetitle) ) <= 70 ) {
		return $thetitle . $theslogan;
	} else {
		return $thetitle;
	}
}
add_filter( 'wp_title', 'vpm_custom_title', 20 );

function vpm_content_header() {

	if ( has_post_thumbnail() && !is_home() ) :
		$post_thumb_id  = get_post_thumbnail_id();
		$post_thumb_url = wp_get_attachment_image_src($post_thumb_id, 'focus');
	?>
		<div class="slide header-bottom">
			<?php if ( is_home() || is_archive() ) : ?><a href="<?php the_permalink(); ?>"><?php endif; ?>
				<div>
					<h2><?php the_title(); ?></h2>
				</div>
				<img src="<?= $post_thumb_url[0]; ?>" alt="">
			<?php if ( is_home() || is_archive() ) : ?></a><?php endif; ?>
		</div>
	<?php else : ?>
		<h2 class="post-title">
			<?php if ( is_home() || is_archive() ) : ?>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<?php else: ?>
				<?php the_title(); ?>
			<?php endif; ?>
		</h2>
	<?php endif;

}

function vpm_wp_query_slider($slider_args, $header_position) {

	if ($header_position == 'top') {
		$get_header_position = 'header-top';
	} elseif ( $header_position == 'bottom' ) {
		$get_header_position = 'header-bottom';
	}

	$slider = new WP_Query( $slider_args );

	if ( $slider->have_posts() ) : ?>
	<section class="slider">
		<div class="infocus">
			<div class="slide-hold">
			<?php while ( $slider->have_posts() ) : $slider->the_post();

				// Get the post thumbnail
				$image_id = get_post_thumbnail_id();
				$image_url = wp_get_attachment_image_src($image_id, 'focus');
				$image_url = $image_url[0];

				// Get the permalink
				if ( get_post_meta(get_the_ID(), 'home_slide_url', true) ) {
					$permalink = get_post_meta(get_the_ID(), 'home_slide_url', true);
				} else {
					$permalink = get_permalink();
				}

				// Output all the things
				?>
				<div id="post-<?= get_the_ID(); ?>" class="slide <?= $get_header_position; ?>">
					<a href="<?= $permalink; ?>">
						<div>
							<h2><?= get_the_title(); ?></h2>
							<?php if ($header_position == 'top') : ?><p><?= get_the_excerpt(); ?></p><?php endif; ?>
						</div>
						<img src="<?= $image_url ?>" alt="">
					</a>
				</div>
			<?php endwhile; ?>
			</div>
		</div>
		<div class="slide-nav content">
			<div class="slide-nav-in">
				<a href="javascript:;" class="slide-prev">Previous</a>
				<a href="javascript:;" class="slide-next">Next</a>
			</div>
		</div>
	</section>
	<?php

	endif;

	wp_reset_postdata();

}


/**
 *
 * Scribu wrappers
 *
 */

function app_template_path() {
	return APP_Wrapping::$main_template;
}

function app_template_base() {
	return APP_Wrapping::$base;
}


class APP_Wrapping {

	/**
	 * Stores the full path to the main template file
	 */
	static $main_template;

	/**
	 * Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
	 */
	static $base;

	static function wrap( $template ) {
		self::$main_template = $template;

		self::$base = substr( basename( self::$main_template ), 0, -4 );

		if ( 'index' == self::$base )
			self::$base = false;

		$templates = array( 'base.php' );

		if ( self::$base )
			array_unshift( $templates, sprintf( 'base-%s.php', self::$base ) );

		return locate_template( $templates );
	}
}

add_filter( 'template_include', array( 'APP_Wrapping', 'wrap' ), 99 );


/*
 *
 * Misc functions
 *
 */

function fuzzyDate($date, $inputFormat = DateTime::ATOM, $outputDateFormat = "l, F dS, Y", $outputTimeFormat = "H:ia") {
	if (!$inputFormat) {
		$inputFormat = DateTime::ATOM;
	}

	if (!$outputDateFormat) {
		$outputDateFormat = "l, F dS, Y";
	}

	$dateTime = DateTime::createFromFormat($inputFormat, $date);

	// Failed to parse, probably invalid date
	if (!$dateTime) {
		return false;
	}

	// Get Timezone so we can use it for the other dates
	$timezone = $dateTime->getTimeZone();

	// Fuzzy Date ranges
	$lastWeekStart = new DateTime("2 weeks ago sunday 11:59:59", $timezone);

	$yesterdayStart = new DateTime("yesterday midnight");

	$todayStart = new DateTime("today midnight", $timezone);
	$todayEnd = new DateTime("today 23:59:59", $timezone);

	$tomorrowStart = new DateTime("tomorrow midnight", $timezone);
	$tomorrowEnd = new DateTime("tomorrow 23:59:59", $timezone);

	$thisWeekStart = new DateTime("1 week ago sunday 11:59:59", $timezone);
	$thisWeekEnd = new DateTime("sunday 11:59:59", $timezone);

	$nextWeekEnd = new DateTime("1 week sunday midnight", $timezone);

	$prefix = '';

	// We have to start with the oldest ones first
	if ($dateTime < $lastWeekStart) {
		// Older than 1 week
		$prefix = "on";
		$fuzzyDate = ucwords($dateTime->format($outputDateFormat));
	} elseif ($dateTime > $lastWeekStart && $dateTime < $thisWeekStart) {
		// Some time in the previous week
		$prefix = "last";
		$fuzzyDate = ucwords($dateTime->format("l"));
	} elseif ($dateTime > $yesterdayStart && $dateTime < $todayStart) {
		// Yesterday
		$fuzzyDate = "yesterday";
	} elseif ($dateTime < $todayEnd) {
		// Today
		$fuzzyDate = "today";
	} elseif ($dateTime < $tomorrowEnd) {
		// Tomorrow
		$fuzzyDate = "tomorrow";
	} elseif ($dateTime < $thisWeekEnd) {
		// Sometime in the current week
		$prefix = "this";
		$fuzzyDate = ucwords($dateTime->format("l"));
	} elseif ($dateTime < $nextWeekEnd) {
		// Some time in the following week
		$prefix = "next";
		$fuzzyDate = ucwords($dateTime->format("l"));
	} else {
		// More than 2 weeks out.
		$prefix = "on";
		$fuzzyDate = ucwords($dateTime->format($outputDateFormat));
	}

	// Midnight or an actual time
	if ($dateTime->format("Hi") != "0000") {
		$fuzzyTime = $dateTime->format($outputTimeFormat);
	} else {
		$fuzzyTime = "midnight";
	}

	$format = '%s %s';
	return trim(sprintf($format, $prefix, $fuzzyDate, $fuzzyTime));
}