<?php
####################################################################
#	File Name	:	ajax_linechartData.php
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
$table = "finance_today";

$result_raw = $mainClassObj->getSchemaInfo($table, "*", "", "", "id", "", "");
// $logObj->printLog(json_encode($result_raw));

foreach($weblibs_raw as $key => $value) {
	if(!array_key_exists($value['note'], $weblibs)) {
		$tempCategory = $value['category'];
		unset($value['category']);
		$value['category'] = array();
		array_push($value['category'], $tempCategory);
		$weblibs[$value['note']] = $value;
	} else {
		array_push($weblibs[$value['note']]['category'], $value['category']);
	}
}



echo json_encode($result_raw);
?>