<?php
####################################################################
#	File Name	:	admin_header.php
#	Location	:	/WEBROOT/admin/templates/
####################################################################

// ob_start();
// session_start();
// error_reporting(E_ALL);
// ini_set("dispay_errors", "on");

require ("../configs/general.config.php");
require ("../configs/url.config.php");
require ("../configs/db.config.php");
// placeholder for util.php


require ("../classes/main_class.php");

// placeholder for PHP MAILER
// placeholder for MAIL TEMPLATES

// DB connect:
$dbObj = new dbConnect;
$connect = $dbObj->connectDB();

?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="author" content="Ke" />
	<!--[if IE]>
	        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	        <![endif]-->
	<title>admin</title>
	<link href="assets/css/login.css" rel="stylesheet" />
	<base href="<?php echo ADMIN_URL;?>">
</head>
<body>
<!-- HEADER END-->