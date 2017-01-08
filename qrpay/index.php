<?php 
header("Content-type: text/html; charset=utf-8");
require_once __DIR__.'/_index.php';

if (!empty($_GET['id'])&& trim($_GET['id'])!=""&&!empty($_GET['price'])&& trim($_GET['price'])!=""){
	die(qrtest(trim($_GET['id']),trim($_GET['price'])));
}
?>