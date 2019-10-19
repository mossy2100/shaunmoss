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
define( 'DB_NAME', 'shaunmoss' );

/** MySQL database username */
define( 'DB_USER', 'shaunmoss' );

/** MySQL database password */
define( 'DB_PASSWORD', '4G2RWhLmfKiZURi8FeI&' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'c>6>-#Hs#a;4<o,PH*N_Re+rEBikTVmL`ox3*OI+N/35!oh2G)*R*_nmZ&qVpdzG' );
define( 'SECURE_AUTH_KEY',  'jDQzn{/U;81w6D!hGr [d~z;Y{,UiqiN$,.|5*kn3y<u]lG3HZ[Myb,{7n.:x.`:' );
define( 'LOGGED_IN_KEY',    'F`BBvUL:Z)<%g.%s.vC #o.+b8!+QH(kMdAww.->)x4/gWbqyp]*U/|fawlbL=2&' );
define( 'NONCE_KEY',        'Z:hdnn{![M/kJ*}k]9]Q!p2QY&~H878K$nSk1mByoZcAqj&o6do;3/R[lW2&v{q(' );
define( 'AUTH_SALT',        '~(J:jfiZ.Y~{Et^Z%?%Z+8TWm$xYEy}xhDP|kyS6@z3`i6%F0Uk<P_|Cikb{OC;o' );
define( 'SECURE_AUTH_SALT', 'NbWQ#rv9:-:</FBJ?3J*-DpQ0k|@GD_RPk.p>BSGbs#DcvI5TS7})71Wn?OBvbFI' );
define( 'LOGGED_IN_SALT',   '|-h_-b<0#k|YT0*oZ}L`>MkRsp~DJvx-@@{ia^7g]YLld`$$U^ `ao@(Xjl(?H3?' );
define( 'NONCE_SALT',       '>}@O+}jLHyEWv)nL2tdvHOq:cog!]FQ)aIRF<s7GW&s3W9PN*ct48}in/uvux9og' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'sm_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
