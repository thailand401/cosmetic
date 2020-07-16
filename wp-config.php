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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cosmetic' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'sT21<7vTlXg!3:}!VO$-?J%d}wv9j;EfpvI$xFt)9dHcqEN4_jGcmygeRS4[x]O0' );
define( 'SECURE_AUTH_KEY',  '&-y~lJQ(8i(8|j=d^Ys!:Gei+$v%_3dY-TPnEe>OUYJ%!KVbkd%WQtI9/)()ia3x' );
define( 'LOGGED_IN_KEY',    'ZTjLhHj3rn,sP: 7!]l9E:x~>6gRyT<ADuP,jPzxSU!+mmsGR;,^cn;<`6cjG[iN' );
define( 'NONCE_KEY',        '%+)6lVX9t:5:CcExA]h 5:y6(eQgn{8lZ,cL7+JsH[I~xr>Qw/+KR5~Tgtm9vjim' );
define( 'AUTH_SALT',        '[6~ktD>T//+)OXf7ao)#Hk(3(; BD3e-AjmcUEn1Ep@1J-h?c,gR#qoO*QFbDJN0' );
define( 'SECURE_AUTH_SALT', '~:=.yA_tKu^)&tzw=pj.@_Fjpb 2=5bM*J9jq;Dd`dx6r_-/f&^II5&^W HA)qkz' );
define( 'LOGGED_IN_SALT',   'ToZ1suJ`/5KHl|)wRqkG@>$`.MwuH]t#,b `?]PN:(#ICVX.VkZ#7P_dNyO`@A`5' );
define( 'NONCE_SALT',       'iVaB[q^mGt8B~BAMkQy7S*cSxm9F1aG{(SN7s=r4MQ}^jjH|CWAssvFg-)/)Aa1t' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
