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
define( 'DB_NAME', 'holdmyproduct' );

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
define( 'AUTH_KEY',         'C=ks3a>^mPqo0K+WL9HBCf~J>P^-PE&CBa|0VLc0>;~N;D1C|3`aBLbk$wH7u7uq' );
define( 'SECURE_AUTH_KEY',  ',!_}rr>=.7>GUFD7jw4G0x B+m8SeZV70wj$R[Djn[8%sjjxa/}B=!R*r#/]N^7A' );
define( 'LOGGED_IN_KEY',    'b?(?-~lZvFC(q/8BtRR:Q8l&L^#b/nnC kTLb$eT.U5.?BQ{ipr,%lTJ;.fA|:H[' );
define( 'NONCE_KEY',        'Gmj[G}PBntkC=c+s:q,kC%C[k4%YV*!L:(qd!)U,t-w<41(^IUDi<MCm]^f}7iH]' );
define( 'AUTH_SALT',        'VP{`0*T~p@W?bV&0<Yu*&`TWBA&u*<j4B%0Zz(ueTa)ammx-*X2)0x!Pvv/D8.44' );
define( 'SECURE_AUTH_SALT', '/]|^~,gppQn<2CdO6uj2Cvi+k2K8W (8ZNB+J.x[DYl%miUK}=@8h/rMOZM/FDsr' );
define( 'LOGGED_IN_SALT',   'WWmI?3D-hZ%C+UF|lsX&9[)g?a#D-J,m)kV!?S ?)qhd]Ak?~)i=JqaKUoH*U/vF' );
define( 'NONCE_SALT',       '{G5iC&]tF_&8 v:.yCj(|Uf6~rMj<^#15 )sw-0DJrl: &}(`:xKz;A0NDwL+zP}' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
