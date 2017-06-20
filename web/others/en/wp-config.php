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
define('DB_NAME', 'pundro_web');

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
define('AUTH_KEY',         'p/< DkE7H[iIIP!<XQm_e iLM[rJdbb5y+cLxB4@AoFM 4QxOM<Ryx[+Amcn52=B');
define('SECURE_AUTH_KEY',  'E9ihb=NBhEL],,Ok`-C_b-/@apN[+g>]FhKt<0Pav6<)0!FK^kr2!Q#K_Guy54:z');
define('LOGGED_IN_KEY',    'N@wW,4y><II:n/k&k>^<g9C!6zY@UoqlBD+T|]+@o]]BqT-4N/!.h!1[s)I0E6)?');
define('NONCE_KEY',        'l4HkyuKqWXRh-ya|%DA6<;;> &wBnTF vn-e_B^bgh2MavXDmkrX?XJsmZe4fB/b');
define('AUTH_SALT',        ':d-(x-v1[ihhP&-@_=U`cYLj]J)))Z4<LiHEJI~3pX)9=DsK <Ko3b42V$ePym~N');
define('SECURE_AUTH_SALT', '`wT:[;BqReWrrEGK^M-_]VEF1$FLb:0s0Jb(1^c^{%U5r-W~Mq7pbC^~xgK$Ku,G');
define('LOGGED_IN_SALT',   '*o Z4/@522P CPQJ1#Ep8q1Mvl?9tHkM{VAv?>z%I7RB4#]6.3;ZzzZNDqYeQvU_');
define('NONCE_SALT',       'j[rljse!wg0=%NzE{@tl_H}P%B_xu^nO8jf2Bd_sBZN3QpSyf++;vaX}];1wlk?,');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'pundro_web_';

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
