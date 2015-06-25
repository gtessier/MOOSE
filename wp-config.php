<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'lpbc_dev');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'G}bH;<;m^^1nm[1ZQI^T<wsjMgUIov|p_%J-GWKm<(|pkD|0@|;agpY57r_h|/0J');
define('SECURE_AUTH_KEY',  'rftY3%-L>6?8pNa9,U&B1PhkjLC_JtZnIY[yJ^9%5*)BQp]|<urP94<B2ZD I|pg');
define('LOGGED_IN_KEY',    '*xdm8~;LD3;j:D+1nmX`yIk_/%WmSi$x8w{Mzql1yrB$Er7z jtGbY(Ryn:LRoc*');
define('NONCE_KEY',        '+|uz|SW0jBp>!bc6T;kI]HIC2WMT;TAaa)RxLjtY4]MZM@W:`)E9^+>e>:f:R wK');
define('AUTH_SALT',        ':k26ywV0 Z7u~QD--?VslKX>6:/L`Dvl|&2W M-HEoE@W:8VAz|csPjQ/cTqY(/3');
define('SECURE_AUTH_SALT', 'L*bTC[)]b)7TcKzQq^-iv|*0X9 f?_i77zmZyqv^?]>QEBOOt)>rgsqn~[&w?708');
define('LOGGED_IN_SALT',   'Mwd]?CgvYj[82-|l)8J:T0|Z&,wS-phLK, bf1`?_0<E!<##ve0<1=M|EKId}ZVX');
define('NONCE_SALT',       '.G!tfe!oc(j2A+(PUi{I.qR!++7o$- gcd 6uX).$/ZUSMX#-k:Un.JAZ(=o(3R:');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wplp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
