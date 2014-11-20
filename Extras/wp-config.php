<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'adhodgson_stillw');

/** MySQL database username */
define('DB_USER', 'adhodgson_stillw');

/** MySQL database password */
define('DB_PASSWORD', '$Sarahippos11');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '4Cm8prDL0NZ8yuew9plswdlBWIfo71NSSBfX8M7fPWyGTalaa3RdZ2tLGBWRiTXx');
define('SECURE_AUTH_KEY', '1R8ZYnyftTPQ3SgRT7MLW8petD8DsIfkrGmd6FZtgfRfIeey421vazdY7rc55Kiq');
define('LOGGED_IN_KEY', 'nh28gZ7v1mLuHBJbtTcPklpzd9HrrLz28jZgVdQni4GQ6iwDjp7TY8a3kcjv4JIP');
define('NONCE_KEY', '8CdU8i9TO8R6tXBDGqkrA4Kqxf5ale3iZSRtvIsx5jlZ8xgTUGnuSweaNzgTrnEW');
define('AUTH_SALT', 'RiTUaBAE5pJ4P8Cxi11XHmRjwMFGOfc1KPZh8Zsn9fSnvGHzQwugXhugYyA2Yb63');
define('SECURE_AUTH_SALT', 'ZmKZDdr2lAmMBRFTIs0YQQa7gG7ocx8t95gkYvQR4QPYoWBwxow1yof92teDycRC');
define('LOGGED_IN_SALT', 'OTKKqe0xeMOQCnzr6sJkntfXBPcM9npdvbQDrm9KFJfC54vnsf5AnrgHrXTvqXzw');
define('NONCE_SALT', 'alw5UTSWYA6rbNd33aOx0SX5o5x1Wmq5zIjvHTRYR5z2ruAnMWMquOySibKQHwaU');

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
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
