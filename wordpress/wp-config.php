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
define('DB_NAME', 'wordpress_pratico');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'Oq2_ um|D_OaA~Y)/aD)nVqdzH,*ZpBBairgNDV[s3XF|*gn?/v|+9xil?l;!5e1');
define('SECURE_AUTH_KEY',  'l]khq~<PCM4s#L19x+$60QugtsmL]*4~Tx(/=n^@MdUX8?N.UP.X4L59VTIdaM+c');
define('LOGGED_IN_KEY',    't}B]))31lZY.F /5cfs1^;*(&z>(`|v4!.vj<0I|_jnl6%C!!lAUeYtHoic7Q*iN');
define('NONCE_KEY',        'GMlWF:w|Q%`yP4Rhk^Wx!5*CeDE;p:|,]~3=B;jnhHeiW=e(,3wln=:&?jtJOxUz');
define('AUTH_SALT',        'g(939v&Hn?1$B7yC5DD@r?*o+{dOV,v|R-*R`w!#)FK0RWr#n YvuxzA[(dGyHDs');
define('SECURE_AUTH_SALT', 't5 UOsJN:@K[X)>36F~[A8*R|tdKXZ =0bZ*R6c.V0vsI*~4)QVD39{`e%5I:Xq!');
define('LOGGED_IN_SALT',   'Ey4y#)9n<Px%D&=~3X&/7eQm|;{dDc>t&AM(-IbUOg0BE w@%p#Pz&eJA(UgRkqj');
define('NONCE_SALT',       'bwXn;)xt=Sj]zmv<#2g4RA?V-y-A!5s.foDelcbB`y+xEmATrI3y;z0[oUM7:1U!');

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
