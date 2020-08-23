<?php
# Database Configuration
define( 'DB_NAME', '' );
define( 'DB_USER', '' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', '' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';
define( 'WP_DEBUG_LOG', false );
define ('WP_DEBUG', false);


# Security Salts, Keys, Etc
define('AUTH_KEY',         'V!V| 5Ym+qh8K1^@A!s4h]jXl&wxB1z<9%EkTDmD2wZSCNpcFUt-vTMBeIw I}FO');
define('SECURE_AUTH_KEY',  '+N7v)TM6)EMuRQoD9z/dA[BlH5OpcrTz[+PSuG@g&)V|91 |WJpVt8q4#N9T$pVF');
define('LOGGED_IN_KEY',    ' M1>,z4y0fs}n&sX>Q/-|,0iB3%#Qs%|!$b@R$MPO/<sc g3b?)8FpIv{f|^|yGX');
define('NONCE_KEY',        'K@%P ;n9OA`+|XM.ANYTt@gBCFX0&G,b0xSPdac:5>&]Gc~/Ekq6GhktSDmU+<]R');
define('AUTH_SALT',        'A*T?~8 )wy%w4Gkx@Qs{,X {ddAFuDO#hE2}5?m|tu[xZPY`FIMb5wA.E2%pGOW>');
define('SECURE_AUTH_SALT', '(v(/AAlIk-*268vdP*K)B1J2eggy$&zDsu5:C?}[;WrKJ:_&sb$TE3-w:T(i)H*J');
define('LOGGED_IN_SALT',   'UqFhN/}ovu.l4FxvdLV(k; (CWIw80AB-,Mk]0F9e?dFg+V0m,^YNFT$<.=c-fY-');
define('NONCE_SALT',       '-dS|IN}1N#IN@)}EKAg=XZ#-CCGYTG-kvj-=/K+3B>~QH6GE?/_s1@#~3kxG8q-}');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'litimberwork' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'WPE_APIKEY', '1b85374847d46cb918329c837813ed7818bd453d' );

define( 'WPE_CLUSTER_ID', '130962' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'litimberwork.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-130962', );

$wpe_special_ips=array ( 0 => '35.226.19.11', );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');
