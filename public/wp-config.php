<?php
// ===================================================
// Load database info and local development parameters
// ===================================================

require_once(dirname(__FILE__).'./../vendor/php/yaml/lib/sfYamlParser.php');
$yaml = new sfYamlParser();
$config = $yaml->parse(file_get_contents(dirname(__FILE__).'./../config/database.yml'));

$urlParts = explode('.', $_SERVER['HTTP_HOST']);
if ($urlParts[0] == 'dev') {
	// Local dev
	define( 'WP_STAGE', 'dev' );
	foreach($config['dev'] as $db_variable => $value) {
		define(('DB_' . strtoupper($db_variable)), $value);
	}
	define('WP_DEBUG', true);
} elseif ($urlParts[0] == 'staging') {
	// Staging
	define( 'WP_STAGE', 'staging' );
	foreach($config['staging'] as $db_variable => $value) {
		define(('DB_' . strtoupper($db_variable)), $value);
	}
} else {
	// Production
	define( 'WP_STAGE', 'production' );
	foreach($config['production'] as $db_variable => $value) {
		define(('DB_' . strtoupper($db_variable)), $value);
	}
}

// ==============
// Misc. Settings
// ==============
define('WP_POST_REVISIONS', 8);

// ========================
// Custom Content Directory
// ========================
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content' );

// ================================================
// You almost certainly do not want to change these
// ================================================
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ==============================================================
// Salts, for security
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
// ==============================================================
define('AUTH_KEY',         ',r8}aNC}*|K^$z]`iZ;`J!$aiGX0A~Eq,}YIcLW];pf|PD4QjmOXf+}uUf}pA}vg');
define('SECURE_AUTH_KEY',  'elbv~#PcKSDUPKpp82)!mrj5s=|j%yG6Z-RV~|nYs-IJ1shK6|[3o1]q ^w2Id#q');
define('LOGGED_IN_KEY',    'h+m]`fZ29Ce_AJ<o][Y=z1|Z>fzWC}k^D]UIEM?ruqomd|^pT}Y31=PThCWp-zG5');
define('NONCE_KEY',        '-@]uHep@53j?T64(UM|An>,#R+>-l4|1@aF~sR$3`x0>3j;haGP0P#+$9n-(:KG6');
define('AUTH_SALT',        'TNDAzvF m1lP9Yz%t8OeYj?RaSu5#_ER(48kpb4^OgK#N)A;(jR|fJ|%L|359_X9');
define('SECURE_AUTH_SALT', 'N@T-{vWKPt5y6oVg-g[|;U3e9Tz&[*#Z(~ceT?%e6`%KAzl2%@2Se4A/r-A/sH@t');
define('LOGGED_IN_SALT',   'V<KhzEHhMwzfAq/gN{Y04GSEHf~Iq(+c:zjm}9.87NV9RWJ/Y(Iot,sxCUG XCp?');
define('NONCE_SALT',       '~-gZF&py;nSNfdQXYL>dfF4Uu0VN/b561nmF0nkmg7cM{JeS8?3[$ljC~tQr-K}:');

// ============
// Table prefix
// ============
$table_prefix  = 'wp_';

// ================================
// Language
// Leave blank for American English
// ================================
define( 'WPLANG', '' );

// ===========
// Hide errors
// ===========
//ini_set( 'display_errors', 0 );
//define( 'WP_DEBUG_DISPLAY', false );

// ==============================================
// SSL login and admin (for *.vanpattenmedia.com)
// ==============================================
define('FORCE_SSL_LOGIN', true);
define('FORCE_SSL_ADMIN', true);

// ===================
// Bootstrap WordPress
// ===================
if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
require_once( ABSPATH . 'wp-settings.php' );
