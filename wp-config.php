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
define('DB_NAME', 'carbon');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '@=:Lj&_m-}|;#Ea;!^~S/I%~AhRX-@6pF *6WemaClLE)2Xa>|-Z$ ;4E4~cjrVd');
define('SECURE_AUTH_KEY',  'h]NtPq1cS4nm-O2FWUHamZm+2JK]s)MTtz,cf._BiO8U8Tm?L**vYy`YN6h,G_&e');
define('LOGGED_IN_KEY',    '|?nyY3pP! 8RQ;mU{3yiv+>FBES+jzQ-&mY)8v-RS D&{V2{n|s7P#[F)C=)Z-cq');
define('NONCE_KEY',        '#XV4a[j{|<^SH$8q!f[5;(e|3S-vIG[no7-2k:>6N R?Ym;B.R%%b>7{1W6SgdX2');
define('AUTH_SALT',        'N!bi9.(Q|(KIqB)#<)Nc@X-%EF>`~0Z8I,r`eu]EpC94y|8#i;-I@vvZG:c/x{i+');
define('SECURE_AUTH_SALT', '@i1N2#H}2qygU2=+s2f4iiE UJ~DOMZ}JpAS*DTrkKAR/69dw {`x7#~!GZNW]q!');
define('LOGGED_IN_SALT',   'dT5?CpWedU!2 zj5rp;z<:*ok(g@o{B1to08`uWn&+Nj{8F *|q[hg%j|*4DUnao');
define('NONCE_SALT',       'bNkdH5`FQ-8Vd@y+YQnO(}}Vmc8f`J<P&.w/D>(iMS)gO=o{ze^0En]egu1horBB');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'fch_';

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
