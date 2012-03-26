<?php

if (!defined('__DIR__')) { define('__DIR__', dirname(__FILE__)); }

// Include Rach5 functions: this is the least you need to run Rach5
require_once locate_template('/inc/rach5-functions.php');

define('WP_BASE', wp_base_dir());
define('THEME_NAME', next(explode('/themes/', get_template_directory())));
define('RELATIVE_PLUGIN_PATH', str_replace(site_url() . '/', '', plugins_url()));
define('FULL_RELATIVE_PLUGIN_PATH', WP_BASE . '/' . RELATIVE_PLUGIN_PATH);
define('RELATIVE_CONTENT_PATH', str_replace(site_url() . '/', '', content_url()));
define('THEME_PATH', RELATIVE_CONTENT_PATH . '/themes/' . THEME_NAME);

require_once locate_template('/inc/rach5-admin.php');
require_once locate_template('/inc/rach5-clean.php');
require_once locate_template('/inc/rach5-htaccess.php');
require_once locate_template('/inc/rach5-html5.php');

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