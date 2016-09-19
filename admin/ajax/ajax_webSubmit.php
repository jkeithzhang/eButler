<?php
####################################################################
#	File Name	:	web_form.php
#	Location	: 	WEBROOT/admin/ajax
####################################################################
//error_reporting(E_ALL);
//ini_set("display_errors","on");

require ("../../configs/db.config.php");
require ("../../configs/general.config.php");
require ("../../configs/url.config.php");
require ("../../classes/log_class.php");
require ("../../classes/main_class.php");

$dbObj = new dbConnect;
$connect = $dbObj->connectDB();
global $pdoConObj;
$logObj = new logClass();
$mainClassObj =	new dbClass();

session_start();
$todayDBDateTime =	date("Y-m-d H:i:s");

$web_table = "web_library";
$web_table_fields = "uri, category, note";
// echo json_encode(json_encode($_POST));

if(isset($_POST['uri'])) {
	$uri			=	$_POST['uri'];
	$note			=	$_POST['note'];
	$categories		=	$_POST['webCategories'];
	
	foreach($_POST['webCategories'] as $key => $value) {
		$value_list = "'".$_POST['uri']."', '".$value."', '".$_POST['note']."'";
		$mainClassObj->insertSchema($web_table, $web_table_fields, $value_list);
	}

	echo "SUCCESS";

}

?>