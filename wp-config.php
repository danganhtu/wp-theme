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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'NU@~<5 ?mdr~*U[u-& k|pnfbPJP^Tawik[?v;$fx{=_|CCS~f=1z+X,1M1CcI=U');
define('SECURE_AUTH_KEY',  'J~Ra_;.y5FNIKG0 pTd`Z[m~p2BmM(+@MOpP:@Z>1uhD@d$H,(D%^NG8e,?SR@^v');
define('LOGGED_IN_KEY',    ':|GYAsr%B!t?%Fht]^P}ZRjekm,V%l1*_PLs/[q+T$]8Jo]l1Opgfc)`<+rl?S2.');
define('NONCE_KEY',        'Kd|o8RAG*NOcAYC(cPas5?E<ati]@OkQ:5cB?L 1<n{op;,# lu{(!.nR{L4(yA%');
define('AUTH_SALT',        'wo|a{z<+VlBYaGN#p087lQ9[>J%eap}Dz%9p>D!8(Lx+SOpZeJKvAMN(>sY6{s,x');
define('SECURE_AUTH_SALT', 'IMBfdkU]MR(7ue]zZYZ(c=L~Sjp}H/f7r?PTd(B:7W/E%p-BN0/Bx48!{vQ;XqPV');
define('LOGGED_IN_SALT',   'Qg2>3p:^dfk5BSR?x_C;89mH_@y^h[9.|%yoFVPF4AM.acl{@V+7gho-Io,5$Ub$');
define('NONCE_SALT',       '!K{sG?q3tRA&M{:8zSDpc`pvIS-I)~*;381*dnigcb6}>&Am`]1HOyqrF-LY(z,;');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('IMPORT_DEBUG', true);