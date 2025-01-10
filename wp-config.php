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
define( 'DB_NAME', 'pesgweb_a' );

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
define( 'AUTH_KEY',         'r`lSC$yAPn<@;*lAmxzxT6teeF[Bx1qQVNHQJ*82w.b3umR3}Uh+!JUI;z%-y?Lx' );
define( 'SECURE_AUTH_KEY',  '|)Z6c,>2I0IT/UZi:RoNYk~:hqWOBBg]rK>:>YFPhO-I16.~Wt$bD_g(EE1Dy[6I' );
define( 'LOGGED_IN_KEY',    '[EO#QFdPUVW%EZQul8u|?j`QDctc?H(BE{Ifw5N]p+6{36.fSl<dCq*yrFW[yf N' );
define( 'NONCE_KEY',        '3_YJE:Xsh+Gp>A93+3i}m}yy8~919~a;n8Q6Q?Ncx?5$Ch?IOF-PES$3H25W?EXv' );
define( 'AUTH_SALT',        '>PfatiEj;RL(KW5uvd,..@ ?HB~J-=R#hPS93[>U[s2-Q>niWU}:8,hshA7une,:' );
define( 'SECURE_AUTH_SALT', 'vk{KpX)FKrKp/kTqvye%/mJz(#ZS{YLlU9C@)E>S0{x:hlK5_a@zYURV>CL?I>r/' );
define( 'LOGGED_IN_SALT',   'tzHzBJd.fIu`#rc|Eg08},TrpIpS?v-MD/_JY8SU|]|VN*p1ucD/.+-:wr-~(gLg' );
define( 'NONCE_SALT',       '8;8=hh3u}5=:nSxk/8EeGX@eq8|(~7jrs*sohTTc{@fDz(1nqExh2%8ZO$7`_?y{' );

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
//define( 'WP_DEBUG', false );
define( 'WP_DEBUG', true);
 	
define('WP_DEBUG_DISPLAY', false);

define('WP_DEBUG_LOG', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

// SMTP email settings - Added by Maria Luz Vargas Hilari
define( 'SMTP_USER', 'pesgweb@gmail.com' );
define( 'SMTP_PASS', 'hyhvedmnlcqndvkl' );
define( 'SMTP_HOST', 'smtp.gmail.com' );
define( 'SMTP_FROM', 'pesgweb@gmail.com' );
define( 'SMTP_NAME', 'PESG Web Form' );
define( 'SMTP_PORT', '587' );
define( 'SMTP_SECURE', 'tls' );
define( 'SMTP_AUTH', true );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

/***Debuging */
if (!function_exists('write_log')) {

    function write_log($log) {
        if (true === WP_DEBUG) {
            if (is_array($log) || is_object($log)) {
                error_log(print_r($log, true));
            } else {
                error_log($log);
            }
        }
    }

}

