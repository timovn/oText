<?php
// *** LICENSE ***
// oText is free software.
//
// By Fred Nassar (2006) and Timo Van Neerden (since 2010)
// See "LICENSE" file for info.
// *** LICENSE ***

header('Content-Type: application/rss+xml; charset=UTF-8');

// second level caching file.
$lv2_cache_file = 'var/cache/static/c_rss_'.substr(md5(isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : ''), 0, 8).'.dat';

// if cache file exists
if (file_exists($lv2_cache_file)) {
	// if cache not too old
	if (@filemtime($lv2_cache_file) > time()-(3600) ) {
		readfile($lv2_cache_file);
		die;
	}
	// file too old: delete it and go on (and create new file)
	@unlink($lv2_cache_file);
}

require_once 'inc/boot.php';

$xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
$xml .= '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/">'."\n";
$xml .= '<channel>'."\n";
$xml .= '<atom:link href="'.$GLOBALS['racine'].'rss.php'.((!empty($_SERVER['QUERY_STRING'])) ? '?'.(htmlspecialchars($_SERVER['QUERY_STRING'])) : '').'" rel="self" type="application/rss+xml" />';

// RSS DU BLOG
/* si y'a un ID en paramètre : rss sur fil commentaires de l'article "ID" */
if (isset($_GET['id'])) {
	$GLOBALS['db_handle'] = open_base();
	$article_id = htmlspecialchars($_GET['id']);

	$liste = liste_elements("SELECT c.*, a.bt_title FROM commentaires AS c, articles AS a WHERE c.bt_article_id=? AND c.bt_article_id=a.bt_id AND c.bt_statut=1 ORDER BY c.bt_id DESC", array($article_id));

	if (!empty($liste)) {
		$xml .= '<title>Commentaires sur '.$liste[0]['bt_title'].' - '.$GLOBALS['nom_du_site'].'</title>'."\n";
		$xml .= '<link>'.$liste[0]['bt_link'].'</link>'."\n";
		$xml .= '<description><![CDATA['.$GLOBALS['description'].']]></description>'."\n";
		$xml .= '<language>fr</language>'."\n";
		$xml .= '<copyright>'.$GLOBALS['auteur'].'</copyright>'."\n";
		foreach ($liste as $comment) {
			$dec = decode_id($comment['bt_id']);
			$xml .= '<item>'."\n";
				$xml .= '<title>'.$comment['bt_author'].'</title>'."\n";
				$xml .= '<guid isPermaLink="false">'.$comment['bt_link'].'</guid>'."\n";
				$xml .= '<link>'.$comment['bt_link'].'</link>'."\n";
				$xml .= '<pubDate>'.date('r', mktime($dec['h'], $dec['i'], $dec['s'], $dec['m'], $dec['d'], $dec['y'])).'</pubDate>'."\n";
				$xml .= '<description><![CDATA['.($comment['bt_content']).']]></description>'."\n";
			$xml .= '</item>'."\n";
		}
	} else {
		$xml .= '<item>'."\n";
			$xml .= '<title>'.$GLOBALS['lang']['note_no_commentaire'].'</title>'."\n";
			$xml .= '<guid isPermaLink="false">'.$GLOBALS['racine'].'</guid>'."\n";
			$xml .= '<link>'.$GLOBALS['racine'].'</link>'."\n";
			$xml .= '<pubDate>'.date('r').'</pubDate>'."\n";
			$xml .= '<description>'.$GLOBALS['lang']['no_comments'].'</description>'."\n";
		$xml .= '</item>'."\n";
	}
}

/* sinon, fil rss sur les articles (par défaut) ou sur les liens ou les Commentaires */
/* Ici, on utilise la petite BDD placée en cache. */
else {

	function rel2abs($article) { // convertit les URL relatives en absolues
		$article = preg_replace('#(srcset=(\'|")?([^="\'\s]+))#i','src=$2$3$2 data-$0', $article);
		$article = str_replace(' src="/', ' src="//'.$_SERVER['HTTP_HOST'].'/' , $article);
		$article = str_replace(' href="/', ' href="//'.$_SERVER['HTTP_HOST'].'/' , $article);
		$base = $GLOBALS['racine'];
		$article = preg_replace('#(src|href)=\"(?!https?)#i','$1="'.$base, $article);
		return $article;
	}


	$fcache = 'var/cache/static/cache_rss_array.dat';
	$liste = array();
	if ( !file_exists($fcache) or !is_array($liste = @unserialize(base64_decode(substr(file_get_contents($fcache), strlen('<?php /* '), -strlen(' */'))))) ) {
		$GLOBALS['db_handle'] = open_base();
		rafraichir_cache_lv1();
		if (file_exists($fcache)) { // file exists but reading it does not give an array: try again
			$liste = unserialize(base64_decode(substr(file_get_contents($fcache), strlen('<?php /* '), -strlen(' */'))));
		}
	}

	if (!is_array($liste)) { // cache file does not work: delete it.
		$liste = array('a' => array(), 'c' => array(), 'l' => array());
		unlink($fcache);
	}

	$liste_rss = array();
	$modes_url = '';
	if (!empty($_GET['mode'])) {
		$found = 0;
		// 1 = articles
		if ( strpos($_GET['mode'], 'blog') !== FALSE ) {
			$liste_rss = array_merge($liste_rss, $liste['a']);
			$found = 1; $modes_url .= 'blog-';
		}
		// 2 = commentaires
		if ( strpos($_GET['mode'], 'comments') !== FALSE ) {
			$liste_rss = array_merge($liste_rss, $liste['c']);
			$found = 1; $modes_url .= 'comments-';
		}
		// 4 = links
		if (strpos($_GET['mode'], 'links') !== FALSE) {
			$liste_rss = array_merge($liste_rss, $liste['l']);
			$found = 1; $modes_url .= 'links-';
		}
		// si rien : prend blog
		if ($found == 0) { $liste_rss = $liste['a']; }

	// si pas de mode, on prend le blog.
	} else {
		$liste_rss = $liste['a'];
	}

	// tri selon tags (si il y a)
	if (isset($_GET['tag'])) {
		foreach ($liste_rss as $i => $entry) {
			if (isset($entry['bt_tags'])) {
				if ( (strpos($entry['bt_tags'], htmlspecialchars($_GET['tag'].',')) === FALSE) and
				 	 (strpos($entry['bt_tags'], htmlspecialchars(', '.$_GET['tag'])) === FALSE) and
					 ($entry['bt_tags'] != htmlspecialchars($_GET['tag']))) {
					unset($liste_rss[$i]);
				}
			}
		}
	}


	// tri selon la date (qui est une sous-clé du tableau, d’où cette manœuvre)
	foreach ($liste_rss as $key => $item) {
		 $bt_id[$key] = (isset($item['bt_date'])) ? $item['bt_date'] : $item['bt_id'];
	}
	if (!empty($liste_rss)) {
		array_multisort($bt_id, SORT_DESC, $liste_rss);
	}

	// ne garde que les 20 premières entrées
	$liste_rss = array_slice($liste_rss, 0, 20);
	$invert = (isset($_GET['invertlinks'])) ? TRUE : FALSE;
	$xml .= '<title>'.$GLOBALS['nom_du_site'].'</title>'."\n";
	$xml .= '<link>'.$GLOBALS['racine'].((trim($modes_url, '-') == '') ? '' : '?mode='.(trim($modes_url, '-'))).'</link>'."\n";
	$xml .= '<description><![CDATA['.$GLOBALS['description'].']]></description>'."\n";
	$xml .= '<language>fr</language>'."\n";
	$xml .= '<copyright>'.$GLOBALS['auteur'].'</copyright>'."\n";
	foreach ($liste_rss as $elem) {
		$time = (isset($elem['bt_date'])) ? $elem['bt_date'] : $elem['bt_id'];
		if ($time > date('YmdHis')) { continue; }
		$title = (in_array($elem['bt_type'], array('article', 'link', 'note'))) ? $elem['bt_title'] : $elem['bt_author'];
		// normal code
		$xml_post = '<item>'."\n";
		$xml_post .= '<title>'.$title.'</title>'."\n";
		$xml_post .= '<guid isPermaLink="false">'.$elem['bt_id'].'-'.$elem['bt_type'].'</guid>'."\n";
		$xml_post .= '<pubDate>'.date_create_from_format('YmdHis', $time)->format('r').'</pubDate>'."\n";
		if ($elem['bt_type'] == 'link' or $elem['bt_type'] == 'note') {
			if ($invert) {
				$xml_post .= '<link>'.$GLOBALS['racine'].'?id='.$elem['bt_id'].'</link>'."\n";
				$xml_post .= '<description><![CDATA['.rel2abs($elem['bt_content']). '<br/> — (<a href="'.$elem['bt_link'].'">link</a>)]]></description>'."\n";
			} else {
				$xml_post .= '<link>'.$elem['bt_link'].'</link>'."\n";
				$xml_post .= '<description><![CDATA['.rel2abs($elem['bt_content']).'<br/> — (<a href="'.$GLOBALS['racine'].'?id='.$elem['bt_id'].'">permalink</a>)]]></description>'."\n";
			}
		} else {
			$xml_post .= '<link>'.URL_ROOT.$elem['bt_link'].'</link>'."\n";
			$xml_post .= '<description><![CDATA['.rel2abs($elem['bt_content']).']]></description>'."\n";
		}
		if (isset($elem['bt_tags']) and !empty($elem['bt_tags'])) {
			$xml_post .= '<category>'.implode('</category>'."\n".'<category>', explode(', ', $elem['bt_tags'])).'</category>'."\n";
		}
		$xml_post .= '</item>'."\n";
		$xml .= $xml_post;
	}
}

$end = microtime(TRUE);
$xml .= '<!-- cached file generated in '.round(($end - $begin),6).' seconds, on '.date("r").' -->'."\n";
$xml .= '</channel>'."\n";
$xml .= '</rss>';

file_put_contents($lv2_cache_file, $xml);
echo $xml;

?>
