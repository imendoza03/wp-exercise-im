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
define('DB_NAME', 'wp-exercise-im');

/** MySQL database username */
define('DB_USER', '');

/** MySQL database password */
define('DB_PASSWORD', '');
// define('DB_PASSWORD', '251248EBF243AB98B99FA52D035774F70BDBA4136322C10711DE92EBF9A9A998');

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
define('AUTH_KEY',         '*n1zEh?jHw{mSQ_.Il/7W#</@UH]cV}T4Fgd|MYnvE]@kJG^AzMK&WG*3}US+WE5');
define('SECURE_AUTH_KEY',  '`_7+4S=O5_./a [VZ& Mok/V.;^J<i6H`E4h`;eE]bw0}t2[wRwHE|e#p%,NDu(#');
define('LOGGED_IN_KEY',    'jKgw<w{R2aM2yd~VnyA/(e:bM^Os,Ws[C{{. AP$tYdq|j/:iaZ6{~VT%kv@E# u');
define('NONCE_KEY',        'V>os!?f|])8$/Z.1IB0f<`7jH9nD_~a$GQTmE7;[ke$ U>`=%X|nX_g->OfZZcIM');
define('AUTH_SALT',        'd7L&gDv9@71u=XU/L<wlDbKpXi)3?WNS]S;jciWYx,35bY=It]ma(M =V?zdl*ei');
define('SECURE_AUTH_SALT', 's!LQ#3QSxqgr6Jz7hu*S|aMN#D}utuXSIwkRD?-n)-lGHp7]BX.JyT0+pSzew/aB');
define('LOGGED_IN_SALT',   '-dQH0Jy/0w`}_`|4uTn1/PvW4NHa2j+I7[S{E7#ae}[W@p}|)cs>W}*nwE^V:?> ');
define('NONCE_SALT',       'B6zpVrMrg-=H0f:>hF|GEi9o8|sPbQ[R1Hjs ro&&%j6GN0S`j&[r{ac`bp|<Xy ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
