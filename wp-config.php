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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mmichy' );

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
define( 'AUTH_KEY',         '<gTwI@~F772ZF?B*;#%yo!/E)NKjN|T^?>0:|dYOn79DjHH&MS zm2@Bty_s+a~a' );
define( 'SECURE_AUTH_KEY',  ',iYHtrz@br9QKd1I:*>!0T:p:5d`rDtU%6%#ba* kw>F};N-A1%461@H]4LmSuC?' );
define( 'LOGGED_IN_KEY',    'D<4`FM.r+;7?T#o8R2#@,c52H.B%5q1]x;4Q!nv}MY>>]zR =;?a VjThtSmX.5D' );
define( 'NONCE_KEY',        'R,K)4f7S,]Z.J7]7TD_cAHw)>Vf_+khGGvsj#GR#V$CD^f5X~{!h,TOV+B2W[~;(' );
define( 'AUTH_SALT',        'B?2q14S[uDY_Eie Orc*HIW2x~s(SL[D{!m&prwOtYNZ;lQp)LZ>bB2V~WNQNOl%' );
define( 'SECURE_AUTH_SALT', 'PX5XF6|:--10[dwY!^jQwawh]4`1)-fc4mp?;}mR~<E6*@efQ1cyL?/:.0YYJ][/' );
define( 'LOGGED_IN_SALT',   '=P(n:OWb.7,=HczpUgrnud]0so[ue~(/4>Av6Opt =jfhE`%Q#}%Z}i5~rqrYrCW' );
define( 'NONCE_SALT',       'RuYMP>{{CK;CeXva!:r/$4c0DKPWY#DK~wPs5%+LTP2#1zB}w)JX>d+kHOVLz{(e' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
