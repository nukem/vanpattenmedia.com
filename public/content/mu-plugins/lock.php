<?php
// HT Mark Jaquith
// http://markjaquith.wordpress.com/2012/05/15/how-i-built-have-baby-need-stuff/

class VPM_Always_Active_Plugins {
	static $instance;
	private $always_active_plugins;

	function __construct() {
		$this->always_active_plugins = array(
			'vanpattenmedia-cpt-setup/vanpattenmedia-cpt-setup.php',
			'rach5-helper/rach5-helper.php',
		);
		foreach ( $this->always_active_plugins as $p ) {
			add_filter( 'plugin_action_links_' . plugin_basename( $p ), array( $this, 'remove_deactivation_link' ) );
		}
		add_filter( 'option_active_plugins', array( $this, 'active_plugins' ) );
	}

	function remove_deactivation_link( $actions ) {
		unset( $actions['deactivate'] );
		return $actions;
	}

	function active_plugins( $plugins ) {
		foreach ( $this->always_active_plugins as $p ) {
			if ( !array_search( $p, $plugins ) )
				$plugins[] = $p;
		}
		return $plugins;
	}
}

new VPM_Always_Active_Plugins;