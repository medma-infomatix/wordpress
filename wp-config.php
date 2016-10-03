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
define('DB_NAME', 'demo_samvedna');

/** MySQL database username */
define('DB_USER', 'demo');

/** MySQL database password */
define('DB_PASSWORD', 'demo4clients');

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
define('AUTH_KEY',         'a##5#OXS^}|rE7Ey<{rqiora6 wo;Y/=8[ %&]eglzrDSAbW.onoDL1*pFs}JmhL');
define('SECURE_AUTH_KEY',  'f@B6cagx:Cr;l`mFzx{vqyB%<1`B-`,IGYiRm^96U)%V<f6iq%Gh^0,R|tg~dF!N');
define('LOGGED_IN_KEY',    'Xft?ew=][M}TrtAxxPq:>{C<VZ``2]t{1YMb?TbZHGn;t{IOI$k2#@|Y[X?Gb[:v');
define('NONCE_KEY',        'Db%!P23%CY7M,~n^CaBNC, Kf|#OLMhd{OS9m6/ } a4y2+LgZDNjW 2MJrAfx7s');
define('AUTH_SALT',        'cs,%R-vmT:nTxxnYk;]!i?R*q<T%WHLjl9$?{<`6.fIm6ih.qPEn &NAb)gW;b]p');
define('SECURE_AUTH_SALT', '$b g^8?]7.e|vgG2Mo({+s3[JZ64B2J[M{uJ|}rM/7W k(v~KHRgs/HIH?uGs4=D');
define('LOGGED_IN_SALT',   'cTer5v&HAVdESTX.Az_y{.Ns^D`bP(e,(trbx|ujUdr`d~8&TE@P^*Fs~X5rz--t');
define('NONCE_SALT',       'r/_DS|&R+_d!~1_$IDIboRI.1pBkja^g&e35fs ]&:[Ip$%8^,or7*QhGfhkC4M?');

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
