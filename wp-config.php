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
define('DB_NAME', 'delta');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'pf$(~Gb*&ve$QC.<KPBi;NCc3W*<:Sh3I/KzvddmGD>!Il/*eaWAwYchjNU6cl`.');
define('SECURE_AUTH_KEY',  ':NZw=CX}&@_i?;>bsjI9Eq~W35=e$d#!8kS|wiodbC@Z#7<AJ}4MdtygWB[1-?*t');
define('LOGGED_IN_KEY',    '|`R*qv7CTd)OSUKy=)t^%V^acVm&hS!R`QxIX;)VBW`|3|BnCp=,;H_nx/fBJvxz');
define('NONCE_KEY',        '{aUzmfgi6Fy4&E}pJBm_ay[n+Von)gdezA<AyvdEL52n,C;3RS4a?Q8;.Ox%L@pp');
define('AUTH_SALT',        'Fx.6T>v/,N8h`san9~b5~;=ea84UU8szE5I/z=-!b[S~c9}@fxpCDt6jx+.YjDD3');
define('SECURE_AUTH_SALT', '1Cy`+>8d*EjV:P9tN,5oUa0QNtU7(g;?m1vZ#0?%d|8>4f?5.rrn}%9r2`{ar*@2');
define('LOGGED_IN_SALT',   'Co.)R@c0T;E#sf@X6Y>7ga3&oT-Or<fX!9wyIq;oD->@h0`u8bla`bc(xSJin2qM');
define('NONCE_SALT',       '%RuRg<}FD9[&!HNw B_ x8={VSsVE*ZD=X3l;=<n~?vbO7H}y4{eT8dNs5:F%<}6');

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
