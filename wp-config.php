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
define('DB_NAME', 'qc');

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
define('AUTH_KEY',         't+OiHz%_2R+_JR2WZf*bH;c9tp)aW^kYK>Ef-p5)MUA<c-7Pil5i;Whu-<{Q<pT^');
define('SECURE_AUTH_KEY',  '-%/vqUz*/a{0=Z EL-cP(emYe:@MA)@jv9@c=@>J8[4iH!bd^@)fYSUEz8qtf3,t');
define('LOGGED_IN_KEY',    'Nu1=*(&+,,?go_f=_lUq!l39+--9B`OmRhO1BB)(s}q=Hi 8x{u0N#.<}E3(W}9h');
define('NONCE_KEY',        '-^i;tJep,m2-Klct|NHCL5U-1%&*CbHw2Br]!Q) t8- ck+>t:OD3B>AQ0c1t>-s');
define('AUTH_SALT',        '.ZcgL7#/mttKWwf7{$|b`6w+,>?|Ym)= ucK!}+!7@.ofs8)p#$!G6oImb[6U%|e');
define('SECURE_AUTH_SALT', 'D_7,};+|nFfre:30^(<%Tmh.0T*Rv-j?UZ!axo&;;d(W0&+Eh!|wkR[_cv}hyA]&');
define('LOGGED_IN_SALT',   '&-ts}6kA>UK6Xf2Y2k2l5h&@b;pUWn;-T5dh`(RbM A?/D[@|NG62F&_7K/a@hY@');
define('NONCE_SALT',       'Jq.1xd-6Dde*GLFpBH]eT..C[XGl=tz/(B*RfbU3j _b67gY,9zW}Ax-`??JN0+Z');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'qc_';

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
