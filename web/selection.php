<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'test12');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'PW7gJdcUA)mQ[b<OTuFDqF[+skp6%t!oq3Tv<.2Y4Vo %69**+<o!6eem3pXB;xQ');
define('SECURE_AUTH_KEY',  '<zQ8&T~!9rAn|E3f*lm,So38z;;!e-[`y|n{@KLSpMXJDIE[w8*2,glT`v@,`jrz');
define('LOGGED_IN_KEY',    't~yFqeWz)8m#{73wcq{$| ^GHhzNw{YrV<B1&dyQC4lF8QFi6_]Xqw)e1WFy1lRf');
define('NONCE_KEY',        ':glkI8Z7uqUKQrAK3:XUiH]tNpX]&.!<(%gr!WsZ!)4S4SUZM&2Q5_<=Nrf|9^pn');
define('AUTH_SALT',        'l^V}h*%IgX3?d{oTZG2KFT$4trX7,^PP!V&0-u)O+re=-R6|D n 6B&i,$!CDP_~');
define('SECURE_AUTH_SALT', 'hZGSJ#gK+<>nW[]X/_W#@js3[[8})<gm*H*]H#ft!gjpi6vLxAxI*g%H7r8<xJY ');
define('LOGGED_IN_SALT',   'Yh<.#j4 6:afin+z}|Z#sg2jsU79U$#ea&9Ud])g]!E 78Jt2yTHF1TCl~+14ON]');
define('NONCE_SALT',       '7_P.=sND8b3Vk :#V<_&+*,nGDv{.OJ_/Rwy^u@*^tj#8~5.j33+=wM<@#W/!kF=');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'test12_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
