<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

/* Setu p env */
$db['production'][DB_NAME] 		= "db_name";
$db['production'][DB_USER] 		= "root";
$db['production'][DB_PASSWORD] 	= "root";
$db['production'][DB_HOST] 		= "localhost";

$db['stage'][DB_NAME] 			= "db_name";
$db['stage'][DB_USER] 			= "stage";
$db['stage'][DB_PASSWORD] 		= "stage123";
$db['stage'][DB_HOST] 			= "localhost";

$db['local'][DB_NAME] 			= "db_name";
$db['local'][DB_USER] 			= "local";
$db['local'][DB_PASSWORD] 		= "local123";
$db['local'][DB_HOST] 			= "localhost";

/* Set up host by name + attribute a url to this host name */
$hosts['stage']					= "project.stage.url.com";
$hosts['local']					= "project.local";


/* if host is empty, by default setup the env to production */
$environment = "production";


foreach ($hosts as $env => $host) 
	if (preg_match("/(www\.)?$host$/is", $_SERVER["HTTP_HOST"]))
	{
		$environment = $env;
	}

	define('DB_NAME'	, $db[$environment][DB_NAME]);
	define('DB_USER'	, $db[$environment][DB_USER]);
	define('DB_PASSWORD', $db[$environment][DB_PASSWORD]);
	define('DB_HOST'	, $db[$environment][DB_HOST]);

	define('WP_SITEURL'	, 'http://' . $db[$environment][DB_HOST]);
	define('WP_HOME'	, 'http://' . $db[$environment][DB_HOST]);


	define('DB_CHARSET', 'utf8');
	define('DB_COLLATE', '');
	
	define( 'WP_AUTO_UPDATE_CORE', false ); /* Set true for WP auto-update */
	

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'put your unique phrase here');
define('SECURE_AUTH_KEY', 'put your unique phrase here');
define('LOGGED_IN_KEY', 'put your unique phrase here');
define('NONCE_KEY', 'put your unique phrase here');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'en_GB');
// New settings added to princepoker on 12/07/2011 by alexandre morin 
define('WP_MEMORY_LIMIT', '64M');


/* That's all, stop editing! Happy blogging. */
      
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

$root = $_SERVER['DOCUMENT_ROOT'];
$curdir = getcwd ();
chdir("$root/forum");  
require_once("$root/forum/global.php");
chdir ($curdir);

?>