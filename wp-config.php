<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'wp_soikeo' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'HpS=IM+*AYKQ<BIA7E<+&|Gz`}[#.9r%52{Yfm]2F9RJp?,6Td&-ztjpE$]$50]z' );
define( 'SECURE_AUTH_KEY',  'S_Rmm$;fT3}3M>n6F37vP6Zp^0wLK+[sa0|/wRAmJu^t8l]H#Se@}o)jTgdO$)y=' );
define( 'LOGGED_IN_KEY',    '3^Yd%/:.Z,3[@1%q3g^-FaF^5gmujh7z92B@6GO5xOI$$6Tz~s.p;zfVteJRsXS[' );
define( 'NONCE_KEY',        '*}!otzGFK[``TRX3p;)YHO,z6V;O>iBU^![BUe33X-!#Q4i8@ KqZ/,tYV(Nd#9e' );
define( 'AUTH_SALT',        'FCe]PZoG%n_,btX8AFP(:B*r73}JY[{]$[bF(W z5t7G =4gaf5%[d<(UFZvzWZs' );
define( 'SECURE_AUTH_SALT', '1PvU<PsuN2?Xb-y?$;=oh@z_,Hh=~%)=EG:l=I>rPY-q)FDXU;:#@}HiHPl>:>zD' );
define( 'LOGGED_IN_SALT',   'M(C7OB6k3A<m]iPkz*B77/gg5R3birr?j#Hemd{C:fI#c7`z3]IB4JN)Vj49W}e5' );
define( 'NONCE_SALT',       '*|e]}.eY[)kEZM{gX^rJJqt>JZ8nb;qC;U(VO&qj!Q@jLJ|P8n@d4=v 4`C`>Q i' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
