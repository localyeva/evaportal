<?php
if (isset($_SERVER["HTTP_X_FORWARDED_PROTO"]) && $_SERVER["HTTP_X_FORWARDED_PROTO"] == "https") $_SERVER["HTTPS"] = "on";
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'eva_portal');

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
define('WPLANG', 'vi');
define( 'WP_AUTO_UPDATE_CORE', false );

define('WORKTIME_URL', 'http://worktime.evolable.asia/');
define('WORKTIME_PORTAL_URL', 'http://worktime.evolable.asia/');
//define('WORKTIME_PORTAL_URL', 'http://worktimeportal.evolable.asia/');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'wl|Fd[.Zz`DcVe?#2|rSYEc,:O`d m3X!dk5U>C;n>AU+WBlx>QQ81xbx+XK!jAp');
define('SECURE_AUTH_KEY',  '1N[-=K@[(Lh=34vXN%m?mY_BzPXDWuQvvf8V#v_x~=3fGDq.;:[,T8`-DEsr:BZ@');
define('LOGGED_IN_KEY',    'T|F_;-ETL8:W$WZ5UHCvFkG|JE0zRRiG!))JZlz}p8RP{Lw;`iO+NKpL5Yl@7#El');
define('NONCE_KEY',        'X^s:h{SR9iiR#Pj*DfFxs~GTv1pW4=Oun|l=6M!^&. |&;b/x26F!pN`|b$q00BI');
define('AUTH_SALT',        'o?Mk_^(> 5K,DAd~qOh5klIhSV4dFY{gF(Z+Fx`w!`.Lz65g~=^1>Vr(YKz;r z ');
define('SECURE_AUTH_SALT', '+In<l]K;E2gl;p%Z)J9[bqWDwzN]Q16gSh|8!-vu0nF/u0|lD_)8Xtb?+DU?wQL&');
define('LOGGED_IN_SALT',   'G.|B81rYVDx|zh/5KyF-v2jCwva6xt%G%y405nsu$,rA3)L#d*`(~#4>/H)7bn>!');
define('NONCE_SALT',       '|XBB|&/V~/Ld+b**(U|hfgOde~8 vh8o|gt|yqCn7z)?erL,a(qx@plCQ?%`vr8F');

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
$_SERVER["HTTP_HOST"] = $_SERVER["SERVER_NAME"];
$_SERVER["HTTP_HOST"] = $_SERVER["SERVER_NAME"];

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
