<?php
####################################################################
#	File Name	:	ajx_secureLogin.php
#	Author		:	Vijay
#	Location	: 	WEBROOT/admin/ajax
####################################################################
//error_reporting(E_ALL);
//ini_set("display_errors","on");

require ("../../configs/config.dbase.settings.php");
require ("../../configs/config.general.settings.php");
require ("../../configs/config.url.settings.php");
require ("../../classes/class.main.php");
require ("../../classes/class.general_utils.php");

$dbObj  	=	new cdBConnect;
$connect	=	$dbObj->connectDB();
global $pdoConObj;

$mainClassObj	=	new dBaseClass();
session_start();
$todayDBDateTime=	date("Y-m-d H:i:s");

if(isset($_POST['op_command']) && $_POST['op_command'] == "SECURE_LOGIN")
{

	$loginEmail			=	$_POST['loginEmail'];
	$loginPwd			=	$_POST['loginPwd'];
	
	$registrationSchema	=	"restaurant_owners";
	$loginCondition		=	"(rest_email = '".$loginEmail."' AND rest_pwd  = '".$loginPwd."')";
	$checkAvailInfo		=	$mainClassObj->getSchemaInfo($registrationSchema, "*", $loginCondition, "", "", "", "");
	$availCount			=	sizeof($checkAvailInfo);
	
	if($availCount)
	{
		$restautantID	=	$checkAvailInfo[0]['rest_seq'];
		$accountStatus	=	$checkAvailInfo[0]['rest_status'];
		$isMailVerified	=	$checkAvailInfo[0]['rest_is_email_verified'];
		$restaurantName	=	trim($checkAvailInfo[0]['rest_resturant_name']);
		$restaurantOwner=	trim($checkAvailInfo[0]['rest_resturant_owner_name']);
		$isSubscriptionPaid	=	$checkAvailInfo[0]['rest_is_paid_subscription'];
		
		if($isMailVerified)
		{
			if($accountStatus)
			{
				
				$adminConfigTable	=	"admin_config_settings";
				$adminConfigSettings=	$mainClassObj->getSchemaInfo($adminConfigTable, "*", "", "", "", "", "");
		
				$orderConfirmMailID	=	$adminConfigSettings[0]['acs_setting_value'];//ORDER_CONFIRM_MAIL
				$govtTaxPercentage	=	$adminConfigSettings[2]['acs_setting_value'];//GOVT_TAX_PERCENT
				$commissionPercent	=	$adminConfigSettings[3]['acs_setting_value'];//ORDER_COMMISSION_PERCENT
				$accSubscriptionFee	=	(float)$adminConfigSettings[5]['acs_setting_value'];//ACCOUNT_SUBSCRIPTION_FEE

				$subscriptionFlag	=	1;
				if($accSubscriptionFee > 0 && $isSubscriptionPaid == 0)
				{
					$subscriptionFlag	=	0;
				}
				
				$_SESSION['RESTAURANT_INFO']	=	array(
															'RESTAURANT_ID' 	=>	$restautantID,
															'RESTAURANT_MAIL'	=>	$loginEmail,
															'RESTAURANT_NAME'	=>	$restaurantName,
															'RESTAURANT_OWNER'	=>	$restaurantOwner,
															'RESTAURANT_SUBSCRIPTION'	=>	$subscriptionFlag,
														);
				
				echo "SUCCESS";
			}
			else
				echo "ACCOUNT_NOT_ENABLED";
		}
		else
			echo "EMAIL_NOT_VERIFIED";
	}
	else
		echo "INVALID_CREDENTIALS";
}
?>