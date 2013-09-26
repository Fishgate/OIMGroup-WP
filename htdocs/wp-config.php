<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //

// Use these settings on the local server
if ( file_exists( dirname( __FILE__ ) . '/wp-config-local.php' ) ) {
  include( dirname( __FILE__ ) . '/wp-config-local.php' );
  
// Otherwise use the below settings (on live server)
} else {
    define('DB_NAME', 'stagidazas_OIM');
    define('DB_USER', 'stagidazas_24');
    define('DB_PASSWORD', 'PSC33VH8');
    define('DB_HOST', 'dedi130.cpt1.host-h.net');
    
    // Overwrites the database to save keep edeting the DB
    define('WP_HOME','http://staging.fishgate.co.za/OIM/');
    define('WP_SITEURL','http://staging.fishgate.co.za/OIM/');
  
    /**
    * For developers: WordPress debugging mode.
    *
    * Change this to true to enable the display of notices during development.
    * It is strongly recommended that plugin and theme developers use WP_DEBUG
    * in their development environments.
    */
   define('WP_DEBUG', false);
}

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '?PB+.X:X?FeOI;S7&J_e(VZECW%ZCoog1-Q_<Rb(7MQ+~hIE9__TT&xRrq>FFiS]');
define('SECURE_AUTH_KEY',  'Q?~.9k0;f.~.8$rsd&Pkeyn]IV.Y}pQ3uz}qjAY@T<q6A{T+J,NpLgB#t7 o+Ssi');
define('LOGGED_IN_KEY',    'vV0HFRsv&OG61D!{mc+r>,n}D:7(2);sGvmQox8S y&YS$kI|$/*u0OYB ]`vJ7c');
define('NONCE_KEY',        'qhM1Rq$}{e 1#7[5)%8#:2!5yNT0_yGNnn>gcNHEMBcbnR*&^rQ9GTbE `lhvt%+');
define('AUTH_SALT',        'qT{XW`5Pen}MOE>AQ4~6?MDKT_7N-}Z[<$jslwzEO92A_x2loS7zH%U2L6U;)$GX');
define('SECURE_AUTH_SALT', 'L|WZ=z&XDGtEfAD|f!%lWrzp:=z7RN `HvWL`.b~{3o_]Ww[+Hk6lp5yx7qr|yKW');
define('LOGGED_IN_SALT',   'TH;Z]{lvRvg4>EGx^:iUogQPC#^Q=2L}.wk5hF*7AL}apD)#$YoP4R<+cXmq%h!f');
define('NONCE_SALT',       '-:nK~TgQDwgI]Dp2alS>6B~vNFndK ZZxZoqZ@Q4TL#aF<)R 8Fc,0%8$,kfx8.)');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
