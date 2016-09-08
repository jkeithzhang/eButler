<?php
####################################################################
#	File Name	:	ajax_secureLogin.php
#	Location	: 	WEBROOT/admin/ajax
####################################################################
//error_reporting(E_ALL);
//ini_set("display_errors","on");

require ("../../configs/db.config.php");
require ("../../configs/general.config.php");
require ("../../configs/url.config.php");
require ("../../classes/main_class.php");

$dbObj  	=	new cdBConnect;
$connect	=	$dbObj->connectDB();
global $pdoConObj;

$mainClassObj	=	new dBaseClass();
session_start();
$todayDBDateTime=	date("Y-m-d H:i:s");

if(isset($_POST['op_command']) && $_POST['op_command'] == "SECURE_LOGIN") {

	$loginEmail			=	$_POST['loginEmail'];
	$loginPwd			=	$_POST['loginPwd'];
	
	$registrationSchema	=	"restaurant_owners";
	$loginCondition		=	"(rest_email = '".$loginEmail."' AND rest_pwd  = '".$loginPwd."')";
	$checkAvailInfo		=	$mainClassObj->getSchemaInfo($registrationSchema, "*", $loginCondition, "", "", "", "");
	$availCount			=	sizeof($checkAvailInfo);
}
?>