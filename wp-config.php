<?php
    /**
     * The base configurations of the WordPress.
     *
     * This file has the following configurations: MySQL settings, Table Prefix,
     * Secret Keys, WordPress Language, and ABSPATH. You can find more information
     * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
     * wp-config.php} Codex page. You can get the MySQL settings from your web host.
     *
     * This file is used by the wp-config.php creation script during the
     * installation. You don't have to use the web site, you can just copy this file
     * to "wp-config.php" and fill in the values.
     *
     * @package WordPress
     */

    // Required for batcache use
    define('WP_CACHE', true);

    // ** MySQL settings - You can get this info from your web host ** //

    if (isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'],'Google App Engine') !== false) {
        /** The name of the Cloud SQL database for WordPress */
        define('DB_NAME', 'gameusher');
        /** Live environment Cloud SQL login and SITE_URL info */
        /** Note that from App Engine, the password is not required, so leave it blank here */
        define('DB_HOST', ':/cloudsql/gameusher-com:us-central:gameusher-sqldb01');
        define('DB_USER', 'root');
        define('DB_PASSWORD', '');
    } else {
        /** The name of the local database for WordPress */
        define('DB_NAME', 'gameusher-com');
        /** Local environment MySQL login info */
        define('DB_HOST', '127.0.0.1');
        define('DB_USER', 'root');
        define('DB_PASSWORD', 'kakaloka');
    }

    // Determine HTTP or HTTPS, then set WP_SITEURL and WP_HOME
    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443)
    {
        $protocol_to_use = 'https://';
    } else {
        $protocol_to_use = 'http://';
    }
    define( 'WP_SITEURL', $protocol_to_use . $_SERVER['HTTP_HOST']);
    define( 'WP_HOME', $protocol_to_use . $_SERVER['HTTP_HOST']);

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
    define('AUTH_KEY',         '}# 0Ty~2a+,|8~>8[kq_:mO/Y*9N-5+PtWoY@Nm*&Amhmx|^26S?}R+8byH7[JAd');
    define('SECURE_AUTH_KEY',  'Q09(EJh!OC_H6I__s?wG65}Osp2V%L[0OPepQ:t+A-gbl8h.kakK$k0hSev+[|6J');
    define('LOGGED_IN_KEY',    'VM %>q._2XZ7+FX&D/+*INZF-DVs+;01f^Z!o|[wKKSY]NWS0/*_9 |XM-):L)J0');
    define('NONCE_KEY',        '^=T7upx<DNlQ(+][&fX`j(_$I+FE<_X|[A&aQ<]|#pcVvH7*yLrekC:F#PtrF_&W');
    define('AUTH_SALT',        '-;o-hNk`&bf<6Muj^/)5x(-o||<EKj~/X!X3CL(WI&+MG$??&Fn6HE-ytDV>wkYK');
    define('SECURE_AUTH_SALT', '#mw*i;*2@ln3alOr0Inz&&e+]kEn3xx:UF`|!-V=|<4WDi1wb;os^*{mK-8IUg$5');
    define('LOGGED_IN_SALT',   '|Ynk$fc3ELQ@Hcysz~C$v/7YQh{dL*!+.cs9FH|f&ZC@j-&&X2wHoB^>C~H$$|1)');
    define('NONCE_SALT',       'e-BF%Lst]3.bE#UFsa`ijypTu!L 2IfP~S Pw|umK/ycMW  ekRnYXe#kOi-uZ[x');    

    /**#@-*/

    /**
     * WordPress Database Table prefix.
     *
     * You can have multiple installations in one database if you give each a unique
     * prefix. Only numbers, letters, and underscores please!
     */
    $table_prefix  = 'wp_';

    /**
     * WordPress Localized Language, defaults to English.
     *
     * Change this to localize WordPress. A corresponding MO file for the chosen
     * language must be installed to wp-content/languages. For example, install
     * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
     * language support.
     */
    define('WPLANG', '');

    /**
     * For developers: WordPress debugging mode.
     *
     * Change this to true to enable the display of notices during development.
     * It is strongly recommended that plugin and theme developers use WP_DEBUG
     * in their development environments.
     */
    define('WP_DEBUG', false);
    
    /**
     * Disable default wp-cron in favor of a real cron job
     */
    define('DISABLE_WP_CRON', true);
    
    // configures batcache
    $batcache = [
      'seconds'=>0,
      'max_age'=>30*60, // 30 minutes
      'debug'=>false
    ];
    /* That's all, stop editing! Happy blogging. */

    /** Absolute path to the WordPress directory. */
    if ( !defined('ABSPATH') )
        define('ABSPATH', dirname(__FILE__) . '/wordpress/');

    /** Sets up WordPress vars and included files. */
    require_once(ABSPATH . 'wp-settings.php');


