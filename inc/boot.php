<?php
// *** LICENSE ***
// oText is free software.
//
// By Fred Nassar (2006) and Timo Van Neerden (since 2010)
// See "LICENSE" file for info.
// *** LICENSE ***


// it's not for 0.00000002 sec ...
$begin = microtime(true);

// Use UTF-8 for all
mb_internal_encoding('UTF-8');

define('BT_ROOT', dirname(dirname(__file__)).'/');

// if dev mod
error_reporting(-1);

/**
 * Import several .ini config files with this function
 * and make ini var as a php constant
 */
function import_ini_file($file_path) {
	if (is_file($file_path) and is_readable($file_path)) {
		$options = parse_ini_file($file_path);
		foreach ($options as $option => $value) {
			if (!defined($option)) {
				define($option, $value);
			}
		}
		return true;
	}
	return false;
}



// Constants: folders
define('DIR_ADMIN', BT_ROOT.'admin/');
define('DIR_IMAGES', BT_ROOT.'img/');
define('DIR_DOCUMENTS', BT_ROOT.'files/');
define('DIR_THEMES', BT_ROOT.'themes/');
define('DIR_DATABASES', BT_ROOT.'databases/');
define('DIR_CONFIG', BT_ROOT.'config/');

define('DIR_VAR', BT_ROOT.'var/');
define('DIR_BACKUP', DIR_VAR.'backup/');
define('DIR_CACHE', DIR_VAR.'cache/');
define('DIR_LOG', DIR_VAR.'log/');

// Constants: databases
define('FEEDS_DB', DIR_DATABASES.'rss.php');
define('SQL_DB', DIR_DATABASES.'database.sqlite');

// Constants: installation configurations
define('FILE_USER', DIR_CONFIG.'user.ini');
define('FILE_SETTINGS', DIR_CONFIG.'prefs.php');
define('FILE_SETTINGS_ADV', DIR_CONFIG.'config-advanced.ini');
define('FILE_MYSQL', DIR_CONFIG.'mysql.ini');

// Constants: general
define('BLOGOTEXT_NAME', 'oText');
define('BLOGOTEXT_SITE', 'https://lehollandaisvolant.net/');
define('BLOGOTEXT_VERSION', '1805-1');
define('MINIMAL_PHP_REQUIRED_VERSION', '5.5');
define('BLOGOTEXT_UA', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0');

// init some vars
$GLOBALS['form_commentaire'] = '';


// ADVANCED CONFIG OPTIONS
import_ini_file(FILE_SETTINGS_ADV);

// DATABASE OPTIONS + MySQL DB PARAMS
import_ini_file(FILE_MYSQL);

// USER LOGIN + PW HASH
import_ini_file(FILE_USER);

// USER PREFS
if (file_exists(FILE_SETTINGS)) { require_once FILE_SETTINGS; }

// Constantes: URL
define('URL_ROOT', $GLOBALS['racine'] . ((strrpos($GLOBALS['racine'], '/', -1) === false) ? '/' : '' ));

// regenerate captcha (always)
if (!isset($GLOBALS['captcha'])) {
	$ua = (isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
	$GLOBALS['captcha']['x'] = rand(4, 9);
	$GLOBALS['captcha']['y'] = rand(1, 6);
	$GLOBALS['captcha']['hash'] = hash("sha1", $ua.($GLOBALS['captcha']['x']+$GLOBALS['captcha']['y']));
}

// THEMES FILES and PATHS
if ( isset($GLOBALS['theme_choisi']) ) {
	$GLOBALS['theme_style'] = str_replace(BT_ROOT, '', DIR_THEMES).$GLOBALS['theme_choisi'];
	$GLOBALS['theme_liste'] = $GLOBALS['theme_style'].'/list.html';
	$GLOBALS['theme_post_artc'] = $GLOBALS['theme_style'].'/template/article.html';
	$GLOBALS['theme_post_comm'] = $GLOBALS['theme_style'].'/template/commentaire.html';
	$GLOBALS['theme_post_link'] = $GLOBALS['theme_style'].'/template/link.html';
	$GLOBALS['theme_post_post'] = $GLOBALS['theme_style'].'/template/post.html';
	$GLOBALS['rss'] = $GLOBALS['racine'].'rss.php';
}

// table of recognized filetypes, for file-upload script.
$GLOBALS['files_ext'] = array(
	'archive'		=> array('zip', '7z', 'rar', 'tar', 'gz', 'bz', 'bz2', 'xz', 'lzma'),
	'executable'	=> array('exe', 'e', 'bin', 'run'),
	'android-apk'	=> array('apk'),
	'html-xml'		=> array('html', 'htm', 'xml', 'mht'),
	'image'			=> array('png', 'gif', 'bmp', 'jpg', 'jpeg', 'ico', 'svg', 'tif', 'tiff'),
	'music'			=> array('mp3', 'wave', 'wav', 'ogg', 'wma', 'flac', 'aac', 'mid', 'midi', 'm4a'),
	'presentation'	=> array('ppt', 'pptx', 'pps', 'ppsx', 'odp'),
	'pdf'				=> array('pdf', 'ps', 'psd'),
	'spreadsheet'	=> array('xls', 'xlsx', 'xlt', 'xltx', 'ods', 'ots', 'csv'),
	'text_document'=> array('doc', 'docx', 'rtf', 'odt', 'ott'),
	'text-code'		=> array('txt', 'css', 'py', 'c', 'cpp', 'dat', 'ini', 'inf', 'text', 'conf', 'sh'),
	'video'			=> array('mp4', 'ogv', 'avi', 'mpeg', 'mpg', 'flv', 'webm', 'mov', 'divx', 'rm', 'rmvb', 'wmv'),
	'other'			=> array(''), // default
);


/**
 * main dependancys
 */

require_once BT_ROOT.'inc/lang.php';
require_once BT_ROOT.'inc/util.php';
require_once BT_ROOT.'inc/fich.php';
require_once BT_ROOT.'inc/them.php' ;
require_once BT_ROOT.'inc/html.php' ;
require_once BT_ROOT.'inc/comm.php';
require_once BT_ROOT.'inc/form.php';
require_once BT_ROOT.'inc/conv.php';
require_once BT_ROOT.'inc/veri.php';
require_once BT_ROOT.'inc/imgs.php';
require_once BT_ROOT.'inc/sqli.php';
