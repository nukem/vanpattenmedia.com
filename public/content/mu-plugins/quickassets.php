<?php
/*
Plugin Name: QuickAssets
Plugin URI: http://www.vanpattenmedia.com/
Description: QuickAssets URLs
Author: Van Patten Media
Version: 1.0
Author URI: http://www.vanpattenmedia.com/
*/

include_once plugin_dir_path( __FILE__ ) . '../../../vendor/php/quickassets/lib.php';
$a = new QuickAsset();

$a->addAssetType('img', array(
	'assetPath' => 'img/',
	'rootPath'  => plugin_dir_path( __FILE__ ) . '../themes/vanpattenpress',
));

$a->addAssetType('js', array(
	'assetPath' => 'js/',
	'rootPath'  => plugin_dir_path( __FILE__ ) . '../themes/vanpattenpress',
));

$a->addAssetType('css', array(
	'assetPath' => 'css/',
	'rootPath'  => plugin_dir_path( __FILE__ ) . '../themes/vanpattenpress',
));

$a->addHost('/', array(
	'assetTypes' => 'img, js, css',
));