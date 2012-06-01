<?php
/*
Plugin Name: VPM Custom Post Types & Taxonomies
Plugin URI: http://www.vanpattenmedia.com/
Description: Custom post type and taxonomy registration for VanPattenMedia.com
Author: Van Patten Media
Version: 0.2
Author URI: http://www.vanpattenmedia.com/
*/


/**
 *
 * Constants
 *
 */

// define( 'VPMCPT_PATH', plugin_dir_path( __FILE__ ) );


/**
 *
 * Register hslides post type
 *
 */

if( !post_type_exists('hslides') ) {
	function register_hslides_type() {
		register_post_type(
			'hslides',
			array(
				'label' => 'Home Slides',
				'description' => '',
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => array(
					'slug' => ''
				),
				'query_var' => true,
				'supports' => array(
					'title',
					'excerpt',
					'custom-fields',
					'thumbnail',
					'page-attributes'
				),
				'labels' => array (
					'name' => 'Home Slides',
					'singular_name' => 'Home Slide',
					'menu_name' => 'Home Slides',
					'add_new' => 'Add Home Slide',
					'add_new_item' => 'Add New Home Slide',
					'edit' => 'Edit',
					'edit_item' => 'Edit Home Slide',
					'new_item' => 'New Home Slide',
					'view' => 'View Home Slide',
					'view_item' => 'View Home Slide',
					'search_items' => 'Search Home Slides',
					'not_found' => 'No Home Slides Found',
					'not_found_in_trash' => 'No Home Slides Found in Trash',
					'parent' => 'Parent Home Slide',
				)
			)
		);
	}
	add_action('init', 'register_hslides_type');
}


/**
 *
 * Register portfolio post type
 *
 */

if( !post_type_exists('portfolio') ) {
	function register_portfolio_type() {
		register_post_type(
			'portfolio',
			array(
				'label' => 'Portfolio Entries',
				'description' => '',
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'capability_type' => 'post',
				'hierarchical' => true,
				'rewrite' => array(
					'slug' => 'portfolio'
				),
				'query_var' => true,
				'supports' => array(
					'title',
					'editor',
					'excerpt',
					'custom-fields',
					'revisions',
					'thumbnail',
					'author',
					'page-attributes'
				),
				'taxonomies' => array(
					'category',
					'post_tag'
				),
				'labels' => array (
					'name' => 'Portfolio Entries',
					'singular_name' => 'Portfolio Entry',
					'menu_name' => 'Portfolio',
					'add_new' => 'Add Portfolio Entry',
					'add_new_item' => 'Add New Portfolio Entry',
					'edit' => 'Edit',
					'edit_item' => 'Edit Portfolio Entry',
					'new_item' => 'New Portfolio Entry',
					'view' => 'View Portfolio Entry',
					'view_item' => 'View Portfolio Entry',
					'search_items' => 'Search Portfolio Entries',
					'not_found' => 'No Portfolio Entries Found',
					'not_found_in_trash' => 'No Portfolio Entries Found in Trash',
					'parent' => 'Parent Portfolio Entry',
				)
			)
		);
	}
	add_action('init', 'register_portfolio_type');
}


/**
 *
 * Register project post type
 *
 */

if( !post_type_exists('project') ) {
	function register_project_type() {
		register_post_type(
			'project',
			array(
				'label' => 'Projects',
				'description' => '',
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'capability_type' => 'page',
				'hierarchical' => true,
				'rewrite' => array(
					'slug' => 'project'
				),
				'query_var' => true,
				'supports' => array(
					'title',
					'editor',
					'excerpt',
					'custom-fields',
					'revisions',
					'thumbnail',
					'page-attributes'
				),
				'taxonomies' => array(
					'category',
					'post_tag'
				),
				'labels' => array (
					'name' => 'Projects',
					'singular_name' => 'Project',
					'menu_name' => 'Projects',
					'add_new' => 'Add New',
					'add_new_item' => 'Add New Project',
					'edit_item' => 'Edit Project',
					'new_item' => 'New Project',
					'view_item' => 'View Project',
					'search_items' => 'Search Projects',
					'not_found' => 'No Projects Found',
					'not_found_in_trash' => 'No Projects Found in Trash',
					'parent' => 'Parent Project',
				)
			)
		);
	}
	add_action('init', 'register_project_type');
}