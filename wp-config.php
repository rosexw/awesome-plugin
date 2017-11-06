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
define('DB_NAME', 'awesome-plugin');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
 define('AUTH_KEY',         ':GXN;hR:rg&;Myxjm{fAJ!rX3-3yvj^92$SJ0Qkvp+UDLRb2d)DpW?qD2+/ZTGR;');
 define('SECURE_AUTH_KEY',  ',l2}JD^#c4l%#D)Wdp5nb(r|7rh@X,?$0@KJ`OtC<L2;[#HqI +/pA=0=Go+|KzQ');
 define('LOGGED_IN_KEY',    '&+c3f-ll~WO&Q&Rmyj<ULn/( *7byA8Od/_DA[0)kak&2|/HZ7^56ifIt.q-{-LM');
 define('NONCE_KEY',        '[[FYzBNtaWjk6F;x[?NciW2G4i1]aZMP`P(ddligI>zzwn|XKZeAvPeekUl#I+x)');
 define('AUTH_SALT',        ']D`^No]9r7m*pOCVA{V1gqeWzJ;,f,1UT6B12$sR@-:x=M#4^24wJy6ZBA>troc=');
 define('SECURE_AUTH_SALT', 'W/3Ha&L@=qO/k;xN)=}%G$M|<;W[MLp~9H7*rqrxU[(?nKPYeXpwz!%9)nO9_w/S');
 define('LOGGED_IN_SALT',   '6JkG+{V`O4+cF1Dtm*+*t:YP9.K:=>^Ri77FYu+dIAP/%/j>g3M,_RlG)N{V;f2f');
 define('NONCE_SALT',       'W)81fVuhY-}nP[P:]|);4)sA g87+}gADL c{b{mT^~oO+jLajkZ[Owa=H.xGrF?');

	 
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
