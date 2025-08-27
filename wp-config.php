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
define( 'DB_NAME', 'snortcode' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'mysql' );

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
define( 'AUTH_KEY',         ']O@j,C&l&v>xcCWuIvxZd-mcD$Ic9^wpnOEB&9YBsIAc_l?<D5N#)Z# }9_.g%zK' );
define( 'SECURE_AUTH_KEY',  'S83o)Cx?N8RK%yIIk0(vhNq%/QBf]kHX+w*@5h.N8q9^3f6W-p{eM+uBp79&oK<v' );
define( 'LOGGED_IN_KEY',    '@Z[s*LZ7us;~4_}kI5CR;Q7SYI_miba>n!5l(KEcCN%UFZ}b+?&uEn:Xoxt.h!R`' );
define( 'NONCE_KEY',        'C{)OiB%V{J-f$20Yb[f{BEmwwgM5HM{7-A$7TM5|K1mm@8.z!|9g9k{/nqqt+(<&' );
define( 'AUTH_SALT',        'NW>U/@,~HO!?{705@,u1i`.N|7? @ZF?kO2o`b6%C6sj8g*^72J=D6Mos]]tIn;4' );
define( 'SECURE_AUTH_SALT', '3EK8|7 v%am/rZ3vyu UvI?x:foma|!8:^pS :&/F|[Mzw- WQWQH&Yfl|##QqHK' );
define( 'LOGGED_IN_SALT',   'k8p;..7,c9$JC<jDLY8XH{~76wq8kt:-q?=$A~H{$?NF_#It5C6JA)V>_L1Mc;ZD' );
define( 'NONCE_SALT',       'dm]sC[I7Mt_OUf(piUXjrOj[*a[[`DcQqcv@,O!~RCY#)%$A)P- )(oA5):V5IlM' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
