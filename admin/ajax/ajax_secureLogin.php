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

$dbObj = new dbConnect;
$connect = $dbObj->connectDB();
global $pdoConObj;
$mainClassObj	=	new dbClass();

session_start();
$todayDBDateTime =	date("Y-m-d H:i:s");

// echo "SUCCESS";
// exit;

if(isset($_POST['op_command']) && $_POST['op_command'] == "SECURE_LOGIN") {

	$loginName			=	$_POST['loginName'];
	$loginPwd			=	$_POST['loginPwd'];
	$targetSchema	=	"admin";
	$loginCondition		=	"(user_name = '".$loginName."' AND password  = '".$loginPwd."')";
	$checkAvailInfo		=	$mainClassObj->getSchemaInfo($targetSchema, "*", $loginCondition, "", "", "", "");
	
	$availCount			=	sizeof($checkAvailInfo);

	if($availCount == 1) {
		$fileContents 	= file_get_contents(ERR_LOG_FILE);
		file_put_contents(ERR_LOG_FILE, $fileContents . "Successfully authenticate user!\n");
	} else if ($availCount == 0) {
		$fileContents 	= file_get_contents(ERR_LOG_FILE);
		file_put_contents(ERR_LOG_FILE, $fileContents . "Failed authenticate user!\n");
	} else {
		$fileContents 	= file_get_contents(ERR_LOG_FILE);
		file_put_contents(ERR_LOG_FILE, $fileContents . "Something weird happened!\n");		
	}
}

?>