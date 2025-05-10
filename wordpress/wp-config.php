<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'nps' );

/** Database username */
define( 'DB_USER', 'nps' );

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
define( 'AUTH_KEY',         '`%N4Q&xx!}/`;{Q~$E!;OP/96L0J)5>k<_LC9 +wQ6{6J8r+Bwzdm@@x& +8D,-i' );
define( 'SECURE_AUTH_KEY',  'v8hwN$(K{m-HB*}eN$3xB-;tcfUgTHFb6!%/iJ=T)%D%!MZ5r6{]J#XfSS&mTY%Z' );
define( 'LOGGED_IN_KEY',    '*s(*by^L~Am6oi T400_/:P,uD9ioi73&VaGSP+T/ Wu^qN(1]Lbih0LL^oFo7yO' );
define( 'NONCE_KEY',        '3iAjs%IRy^.fbBDCQjrPxABaqm>d(>?}{U|1>jpsjE}l.~4JqLik3t(Z}C5V@>]P' );
define( 'AUTH_SALT',        'SSxi7wJ!?.q3}Xm;ArrAqpw15atZx*ky+@kfnmZd)Mon5(^rgRJQXV:]J_H w1dq' );
define( 'SECURE_AUTH_SALT', '0uJuO_J`$#D_~6F{6>6BMx?SBfw{8^#=&C}KvCjE,,zyPuCXNm^ML8_TQ8c.,:2J' );
define( 'LOGGED_IN_SALT',   '$lG7})6mOHj.A2A|El}tlbRfQ-PSe!=8%TrO)%wOT!2Vz*bGS/&dmi%)9P=ac;!_' );
define( 'NONCE_SALT',       'R!*EsLj#f/H#:iU*P}{BC$)uuvl?!jSCY]=!%oiODRh72DrSW~;NC]jIfC*vxkxm' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors', 0);
define('FS_METHOD','direct');
/* Add any custom values between this line and the "stop editing" line. */

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';