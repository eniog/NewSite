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
define( 'DB_NAME', 'otwarter_wp531' );

/** MySQL database username */
define( 'DB_USER', 'otwarter_wp531' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Sp4p5.21-Q' );

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
define( 'AUTH_KEY',         '6hc2gxq42p4nvuggsxc61qfk6tlmopju5qvuckou4df0rs5pueejokowgxcnffau' );
define( 'SECURE_AUTH_KEY',  '3jbr1skqvy0jq7kcckcjtfv98gnbjyttxfm84d7preriinozcbfmuzu5geuac4ap' );
define( 'LOGGED_IN_KEY',    '6jcwka9nwam4zzffmsqq8o7wf8tslznh3jzc9s1f5gqcctcj62omlezrifbo1o6o' );
define( 'NONCE_KEY',        'mphf9w9ol9zb0ysildr4piwohcryismtgbh6snnx063flfejxqfaixsw5ospror1' );
define( 'AUTH_SALT',        'lozojqxicoukntr36wssclaahvsy76qis4cecacsxxxnm5qsidk2dbjtchighq08' );
define( 'SECURE_AUTH_SALT', 'td7nl2wbevrysaegfv6avhhvfbkaglanpuamrlmbzvb1qbkwgzpy8cvh4s2pyful' );
define( 'LOGGED_IN_SALT',   'uixh4su9xjspvuo2hrwz3xc3rswq1ppiflqclmh3y2ukectn9pligoaxdqhkn3sv' );
define( 'NONCE_SALT',       'llby5wqlgm9ats0qnnqutvrbobc9zrydntjeg1gt1qbqhlyucdz1xrzvhsgkipcw' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpzb_';

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
