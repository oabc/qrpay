<?php
header ( "Content-type: text/html; charset=utf-8" );
require_once '../bin/include.dbtest.php';
	function writeLog($text) {
		// $text=iconv("GBK", "UTF-8//IGNORE", $text);
		//$text = characet ( $text );
		file_put_contents ( "log/log.txt", date ("Y-m-d H:i:s",time()) . "  " . $text . "\r\n", FILE_APPEND );
	}
	function writeDb($text) {
		global $db;return $db->insert("ali_log",["text" => $text],true);
	}
$aw='get['.serialize($_GET).'] post['.serialize($_POST).']';
echo $aw.'<br/>result('.writeDb($aw).')';
?>