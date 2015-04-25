<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'kauffman_wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'E#&o,@-cG6IP>7C-f2&rlIJR,[vT9r~@0=2%wxk|jOZJ>-$7v7./3?77p*nID]C-');
define('SECURE_AUTH_KEY',  '`$3G|7Hj,WaBkW#%-z~h`X}hp![DN!{d,TPuiq=}9+V_X6uo6-}-6LMD7|Hagsjp');
define('LOGGED_IN_KEY',    'Fwpb,MWKm28u|Q0V+&zzlcRIJ)K/+#**PEvb*O#djmtI(Av.J>`ODQS::.^<B?lF');
define('NONCE_KEY',        'w6 ]A#[rl3@XbkDzZg/t7e=A@Jj`r>g|8E}@:R</2&!szNGa,%hLQeoq0#`_onu+');
define('AUTH_SALT',        'Y/P_6gsB3st&oN3=#:ZsQ 7tc.(xPG1+jL#pK-cw9+WE$sC+eWS1$k&R/Bynh9}Z');
define('SECURE_AUTH_SALT', 'taNifV+K|^atW1sGj4w v^|YxR+`B3W+~&Nh+GjtcQ0.uD;}[%bDmHrwAnd.J$8W');
define('LOGGED_IN_SALT',   'JS6|V&~[t5c7Um1kr|[l`(dLuXH;PTcy5F-rznCjwUb|brbJRQC9|+qT-!6nd+)S');
define('NONCE_SALT',       '=]&P,TypP8Sk9O-_~azs!wHhvy,aZ#A=>1-Kp,S{tJf#<~HZl]4SpQ$kH$KFeS?/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
