<?php
//Begin Really Simple SSL Load balancing fix
if ((isset($_ENV["HTTPS"]) && ("on" == $_ENV["HTTPS"]))
|| (isset($_SERVER["HTTP_X_FORWARDED_SSL"]) && (strpos($_SERVER["HTTP_X_FORWARDED_SSL"], "1") !== false))
|| (isset($_SERVER["HTTP_X_FORWARDED_SSL"]) && (strpos($_SERVER["HTTP_X_FORWARDED_SSL"], "on") !== false))
|| (isset($_SERVER["HTTP_CF_VISITOR"]) && (strpos($_SERVER["HTTP_CF_VISITOR"], "https") !== false))
|| (isset($_SERVER["HTTP_CLOUDFRONT_FORWARDED_PROTO"]) && (strpos($_SERVER["HTTP_CLOUDFRONT_FORWARDED_PROTO"], "https") !== false))
|| (isset($_SERVER["HTTP_X_FORWARDED_PROTO"]) && (strpos($_SERVER["HTTP_X_FORWARDED_PROTO"], "https") !== false))
|| (isset($_SERVER["HTTP_X_PROTO"]) && (strpos($_SERVER["HTTP_X_PROTO"], "SSL") !== false))
) {
$_SERVER["HTTPS"] = "on";
}
//END Really Simple SSL




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

define( 'DB_NAME', "blog" );


/** MySQL database username */

define( 'DB_USER', "blog_user" );


/** MySQL database password */

define( 'DB_PASSWORD', "" );


/** MySQL hostname */

define( 'DB_HOST', "localhost" );


/** Database Charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8' );


/** The Database Collate type. Don't change this if in doubt. */

define( 'DB_COLLATE', '' );


define( 'MEDIA_TRASH', true );

define('WP_MEMORY_LIMIT', '64M');



/**#@+

 * Authentication Unique Keys and Salts.

 *

 * Change these to different unique phrases!

 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}

 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.

 *

 * @since 2.6.0

 */

define('AUTH_KEY',         'JriU3eib,&o12se%;0*M;]aJ|6*Mis>r-T*H]%p|YqPseYV6,q)%clOZb;h(!6U+');
define('SECURE_AUTH_KEY',  ')ZF[kal:q!n;O^ZEe>&e6<8D:12ysl$!V%w.O|a1QG>IQsg:W/$J9UsVixe9RKQy');
define('LOGGED_IN_KEY',    'd8FU$~$aME|54;4|[~0kb,N;-{5LHn(&j5-C4r68_jZD.[G@-e{1I -:|p%oT-~x');
define('NONCE_KEY',        '~g__bu(Nb@Kz*c,^RB oar|3{Eb$sIEG4k#~m^Rq@HqM=/R. =Gq/pp=rKT@Qinl');
define('AUTH_SALT',        '&s]EY,=fOHB$.nq!O-S-%24<vkUh44<8-/nu<Zfc*x;M[Evw Y:~yz3qP)2Y-K1(');
define('SECURE_AUTH_SALT', '!V}do,4[Fl<;7_{|)h#@B;ZUEB:&o,~?7+2zaADL#n0)b>Gl3Z B6r@io[_[XX33');
define('LOGGED_IN_SALT',   'G)vw*(Rkl?Kdf#OK!iaY|4[?Ah@8K:4WAl8`)<A$S!K#qp6D>2c|x,)D1Q!W//<$');
define('NONCE_SALT',       'Z&|4Led@.+wrN)O_^;(^S#xi{ZY*0q1n##a+7{G.R0@(xfcqWcwVVVpHm7Gkd0fm');

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

 * visit the Codex.

 *

 * @link https://codex.wordpress.org/Debugging_in_WordPress

 */

define( 'WP_DEBUG', false );


define( 'FORCE_SSL_ADMIN', false );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

}


/** Sets up WordPress vars and included files. */

require_once( ABSPATH . 'wp-settings.php' );

