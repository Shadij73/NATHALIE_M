<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'nathalie_m_db' );

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
define( 'AUTH_KEY',         '/D4+(;a+<KwQG{5[~8(ZvUMrdIThI.e^}e/#jK4]DD/)yR.ZPC>f(d/>TXtVt-Qr' );
define( 'SECURE_AUTH_KEY',  '^(HpgN4{r7X;l~3,/_:qHh6(EriPYt4i_^&3`]UY)9[w3JWPF-nZr@,/EAR<h|S<' );
define( 'LOGGED_IN_KEY',    'r9lzE3f{I~ZOG53=Qa_PY)>,M[*Y91l*Cg-AyN)-ufv2.v&Kz9`uHPK%KLRTW:jX' );
define( 'NONCE_KEY',        'AwTbUXIS,tx?Gry,,)WHS)+=kprJsH-SDmU!5OG_l=(!%{r2,}^20^U%~r-ZcvN%' );
define( 'AUTH_SALT',        'VwwxI EcQHx6~KyI#4x$LJ}kQ:LT$,xkNcMEHUnX|5l|juo|7An.N>gm,/!-C8&]' );
define( 'SECURE_AUTH_SALT', '#bA4tL2yqI ><JJbheZj_s6+G1G$#iTu(%[:Mt[fZ1o6CRUPG2RYt[$!n|1G+>NW' );
define( 'LOGGED_IN_SALT',   '!Br/N#--?YII;]0fLET$=F.$;JB]2(puR%NlWwQKy#6tpvapSBH+vp^+WT`,uI[F' );
define( 'NONCE_SALT',       '2Dz/z,_J*+Sk8Wh6G7H4+n {0p!>WV&,)L%@Cr.YS8@4d ]@8jd_K? <p33|24&9' );

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
