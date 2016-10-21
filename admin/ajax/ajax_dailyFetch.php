<?php
use Ke\Toolkit as fli;
####################################################################
#	File Name	:	ajax_dailyFetch.php
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
$logObj = new fli\logClass();
$mainClassObj =	new dbClass();

session_start();
$table = "finance_daily";
$result = array();
$result_raw = $mainClassObj->getSchemaInfo($table, "*", "", "", "id", "", "");
// $logObj->printLog(json_encode($result_raw));

foreach($result_raw as $key => $value) {
	$temp = new stdClass();
	// $logObj->printLog(json_encode($value));
	if($value['type'] == 1) {
		$temp->title = $value['title'] . " +$" . $value['amount'];
		$temp->color = 'mediumseagreen';
	} else {
		$temp->title = $value['title'] . " -$" . $value['amount'];
		$temp->color = 'crimson';		
	}
	$temp->start = (strtotime($value['year']."-".$value['month']."-".$value['day']))*1000;
	array_push($result, $temp);

}
echo json_encode($result);