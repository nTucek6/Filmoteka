<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'filmoteka' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'CT-Pa[V>_CU-usX]oW,}Wr9`_qh,dih 8zuu`ER{i//KlC[rso4K`PH5w&j@uv|E' );
define( 'SECURE_AUTH_KEY',  '9!rslm?`q@G9#KAOOFEMwxGI]Jb~a%T-u9&FxGhWPkldJ6A6)[s](&;.4p(BD])|' );
define( 'LOGGED_IN_KEY',    'NzKWP GpdAR?Lx[HI1Zt:vhy=kUQoguga(_{5wlc$].fVvC5?{SS(6)n9?tjsA6k' );
define( 'NONCE_KEY',        'KA7SMBT$0QAaWDMAwmbOXkzh59J#m?dR&JbGcjaPY!s#K!ytdET.[=-iOwZ9I7{b' );
define( 'AUTH_SALT',        'l5y0dwo2`eVo`]XQbs#cG +mIC9IOx(FhzOW]l-(x?j>jT#0TBs7Jc=W>TZ!Yiam' );
define( 'SECURE_AUTH_SALT', ')QE1p[.x+/?/ JfT&H*{/Kh[2ytAJmCXxef=u1x8%F@Q>AVICp<zjf_f%~rTm{+3' );
define( 'LOGGED_IN_SALT',   ']vgcMGjz=<<J^DQ(@%<`#Ds**j{;1pWA%,tj$3gScrY:KcdbnZb+<_8^J)!Y2OHq' );
define( 'NONCE_SALT',       '*X@d@GIg^t+loC`Cb8|e$C.etdhwwI3cuk2ctG+q5x0nwFMYM6y$:i|J{NQhZ1)h' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
