<?php
/**
 * Created by PhpStorm.
 * User: airwalk
 * Date: 16/5/20
 * Time: 下午7:54
 */

header("Content-type: text/html; charset=utf-8");
require_once __DIR__.'/_query.php';

if (!empty($_GET['id'])&& trim($_GET['id'])!=""){
    die(json_encode(qrquery(trim($_GET['id']))));
}

?>