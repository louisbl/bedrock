<?php
$root_dir = dirname(__DIR__);
$webroot_dir = $root_dir . '/htdocs';
$wp_dir = $webroot_dir . '/wp/';
define('CONTENT_DIR', '/app');

/**
 * Use Dotenv to set required environment variables and load .env file in root
 */
Dotenv::required(array(
'ACF_LITE',
'AUTH_KEY',
'AUTH_SALT',
'DB_NAME',
'DB_PASSWORD',
'DB_USER',
'DISPLAY_ERRORS',
'LOGGED_IN_KEY',
'LOGGED_IN_SALT',
'NONCE_KEY',
'NONCE_SALT',
'SAVEQUERIES',
'SCRIPT_DEBUG',
'SECURE_AUTH_KEY',
'SECURE_AUTH_SALT',
'WP_CACHE',
'WP_DEBUG',
'WP_DEBUG_DISPLAY',
'WP_DEBUG_LOG',
'WP_HOME',
'WP_SITEURL'
));

if (file_exists($root_dir . '/.env')) {
  Dotenv::load($root_dir);
}

/**
 * Set up our global environment constant
 * Default: development
 */
define('WP_ENV', getenv('WP_ENV') ?: 'development');

$envs = array(
  'development' => getenv('URL_DEV'),
  'staging' => getenv('URL_STAGING'),
  'production' => getenv('URL_PROD'),
);
define('ENVIRONMENTS', serialize($envs));

ini_set('display_errors', getenv('DISPLAY_ERRORS'));

define('WP_DEBUG', getenv('WP_DEBUG'));
define('WP_DEBUG_DISPLAY', getenv('WP_DEBUG_DISPLAY'));
define('WP_DEBUG_LOG', getenv('WP_DEBUG_LOG'));
define('SCRIPT_DEBUG', getenv('SCRIPT_DEBUG'));
define('SAVEQUERIES', getenv('SAVEQUERIES'));

define('ACF_LITE', getenv('ACF_LITE'));

define('WP_CACHE', getenv('WP_CACHE'));

define('WP_HOME', getenv('WP_HOME'));
define('WP_SITEURL', getenv('WP_SITEURL'));

/**
 * Custom Content Directory
 */
define('WP_CONTENT_DIR', $webroot_dir . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);

/**
 * DB settings
 */
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
$table_prefix = getenv('DB_PREFIX') ?: 'wp_';

/**
 * WordPress Localized Language
 * Default: English
 *
 * A corresponding MO file for the chosen language must be installed to app/languages
 */
define('WPLANG', getenv('WP_LANG') ?: 'en_US');

/**
 * Authentication Unique Keys and Salts
 */
define('AUTH_KEY', getenv('AUTH_KEY'));
define('SECURE_AUTH_KEY', getenv('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY', getenv('LOGGED_IN_KEY'));
define('NONCE_KEY', getenv('NONCE_KEY'));
define('AUTH_SALT', getenv('AUTH_SALT'));
define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT', getenv('LOGGED_IN_SALT'));
define('NONCE_SALT', getenv('NONCE_SALT'));

/**
 * Custom Settings
 */
define('AUTOMATIC_UPDATER_DISABLED', true);
define('DISABLE_WP_CRON', true);
define('DISALLOW_FILE_EDIT', true);

/**
 * Bootstrap WordPress
 */
if (!defined('ABSPATH')) {
  define('ABSPATH', $wp_dir);
}
