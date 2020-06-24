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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'otwarter_wp228' );

/** MySQL database username */
define( 'DB_USER', 'otwarter_wp228' );

/** MySQL database password */
define( 'DB_PASSWORD', 'A02[3JS!4p' );

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
define( 'AUTH_KEY',         'ik74psrpukukd0n7w8wcuznnzdodqimgfecztldpiqw7mdvat7objqwncvajqkp0' );
define( 'SECURE_AUTH_KEY',  'b5q4rurqlotjhrcimhdrjp2v6wxbvade7mv1bgmqipq5elkevkpjpmgr2qwkiao7' );
define( 'LOGGED_IN_KEY',    'tb9wo5m36c2zfwzkiu9gzle56ky8gmcm6dckssuddsu3vj73jstywiisvj7skeuc' );
define( 'NONCE_KEY',        'ffibynbutfyur7fy1wlbm42eylaatgc0tsnsruss0ywbjurdnrak6nl58lqvqoox' );
define( 'AUTH_SALT',        '6xzxtywzqlxpmkfpyip1mhmq4tgn3qkzelywysytbx0vrimhk89hhz3t7jeqdiv7' );
define( 'SECURE_AUTH_SALT', 'be0rpbcgszzc7cgq7kqbujop3ttrssklnzwwug8ug13661ghnxv84o9klisu8fsf' );
define( 'LOGGED_IN_SALT',   'xpdyzad0eq7ndsdjx2k6eezjrqloa5yfnp4pydkjjbyof4wtsdgomrxr7voseqdq' );
define( 'NONCE_SALT',       'lpfltomvtqxf9zmjkwkae18wvl91igeh6rfjljbgfoh6e3a0eiurbw2snffeqsmu' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp6b_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
