<?php
header ( "Content-type: text/html; charset=utf-8" );
require_once '../bin/include.dbtest.php';

	function writeDb($text) {
		
		global $db;return $db->insert("ali_log",["text" => $text],true);
	}
$aw='get['.serialize($_GET).'] post['.serialize($_POST).']';
echo $aw.'<br/>result('.writeDb($aw).')';
?>