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
define('AUTH_KEY',         '7WJFRT0M(I.^~$c2(KJ>Md27t?~r,_cM)iBwpLO(b2ai%jFLT6t<?%NE-r`76b&[');
define('SECURE_AUTH_KEY',  '6hVRsXe[U)Td+8fdMvR(-b46xK+*u;7c&u]`P%>.32@& omz~5WX|@dAnc`j)V04');
define('LOGGED_IN_KEY',    'qBPgFssoXLi!;r+j_2altL?xm*I&5+[fwxT+6`DR,CDvx%W5nXYG$A)Az$D2`<9k');
define('NONCE_KEY',        'L<& x)s0W( kowTVxx&In1`+oh%oS7]H9H{JkU#J?Q [F44qr>0Btgxe|}IE&f~0');
define('AUTH_SALT',        '*!~:mx|6W*<^v(KxM.;}09qw}_%o!1gC=)6+R9VSj)xIJ-PX56QO~:x$[G?l2SAy');
define('SECURE_AUTH_SALT', 'l>r3`:DPqLFG=]^}#8eaS2 ZHDPl>r%w{fVSJ*bU!,wjUADt(N&EkWJfAOh!egl)');
define('LOGGED_IN_SALT',   'h[EtT<0rGUch<6.2.gS=Ej*~|/w)oeZ[m~C4OQNcv}:a0RkxGF`SlTGm6f]~yP}v');
define('NONCE_SALT',       'yJ?CuBDdm:wA`7}?n|bg{S6iRdCqW(k~dE~m8U(9U1B%zg.I kip1Z!yH<Wtwi~A');

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
