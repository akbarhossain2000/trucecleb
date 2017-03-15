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
define('DB_NAME', 'truceclab');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'uYisr?TA+Te#`<-k!AT5~~85]V;LNN&vs`R&5Yc!?xZu4xzT2G@i(p5Fe/-0,M}L');
define('SECURE_AUTH_KEY',  'D`IO<T~4Cvc2du@Q&lhI^v;6Z<}!hb9Pm? lWNAo5;H|G=,kPZ1/34tziX9aHDBx');
define('LOGGED_IN_KEY',    '(P 7! w53N_jx7{mr19(h72s~Qbw<X?lIum*9=Er0<!UI -|y}!qWk6~>>p/7 >X');
define('NONCE_KEY',        '(OiiJg,u0zW%/7u8n)Pv_m+4}:#)?t8RxXJ>.BN[P]21L$G,_>#N{P&,1}_TZBbL');
define('AUTH_SALT',        '{=0TrQohXpr~+=u%]#z)=P%Zaa@$j#GS-A%QcSCG!tJFXDY!JxEECddtpkE7q))A');
define('SECURE_AUTH_SALT', '6zs84ulU^v~]m[q-c(>1-n9T/ci0bk@=t99eRw9RgS5wOnU,TX}hD_G7K`0`B[Wc');
define('LOGGED_IN_SALT',   '/lx)9.W[AaA=ZVQ1Nff_HAZ:}sW$madl{2&:TFR<+Vz <;$D*S_0enq)]} Lq=`<');
define('NONCE_SALT',       '8]?e5`Qc/y(%Kr&e7;Kt@KQr3(D[E#h<e_LIJo?AMWtwto5p~=#ijMV4|[=D-aQf');

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
