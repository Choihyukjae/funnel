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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );


/** 서버 포트 값 에러(젯팩)  2023-08-21 add 최혁재  */
define( 'JETPACK_SIGNATURE__HTTP_PORT', 10005 );

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


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', true );
}


define('AUTH_KEY',         'BItJy4R+Er0Jlqop/zww9ImZ4oLPSpCu9yLD8oBBb010OZotKDafLHZL87Jgfjk0akc9udNjaLFBzc0oBpgSRQ==');
define('SECURE_AUTH_KEY',  '2F6Z4yMVM/yfHhYSG8j1NzSBLGx/CFk2Ov0LUaObBwp//Kpysm3GMPcd7JtifQpQUE7v2fFmxbvB36eaLZVBIw==');
define('LOGGED_IN_KEY',    '4Xr9QKf/Ko9iuwOK4VQ1MH42VE5xD4AhxTXcdT2RAFjaVdovx7gpO5aUdbJtdQj24r3noTZ7w8Dcmj1i8PkZ7Q==');
define('NONCE_KEY',        'Kx3z937T/qtO8h/OMrSQpZiUQRmWNf9RGLuFZ/Hljy6NUdERXDiGUcd30wv0qtOyo2OQntHZHDr6jjmBZc8Y0g==');
define('AUTH_SALT',        '5ySoUthdHRAV9NPxyLakQvLwP+Cee0G8V+HJdCyNtJ24burXwkVC01FPP9JbgAAyIZR+1hBoYhxveIL2QvZmFw==');
define('SECURE_AUTH_SALT', 'gt8So0zsEtGyNq9vA07LATrIgE1/Z6OUG8qOxhYybiVtwKFzno+iv+c8lxxC12OVxKMrQgNe0dTMf17++ICwmQ==');
define('LOGGED_IN_SALT',   'EZP9amS7gVlgzqtiJU40Z7vAUVMwtqRDqkRVL7oKOIhzsPVSPPjCMThJvnB+ymgqi+WBIbEgCzW2BOSw1M9dhg==');
define('NONCE_SALT',       'NdurcO++u5uL6KA7TvapF4fiUphfPO442JI/6xt0u37YJa514Lse7KwWEp1AK8bLoXWtMtzrcgs8PPrWN8j4yw==');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
