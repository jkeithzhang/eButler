<?php
####################################################################
#	File Name	:	url.config.php
#	Location	: 	/WEBROOT/configs/
####################################################################

# Getting Server's Document root path
define("DOC_ROOT", $_SERVER['DOCUMENT_ROOT'].'/ebutler/');
define("DOC_ROOT_ADMIN", DOC_ROOT.'admin/');

# Custom Error Log File
define("ERR_LOG_FILE", DOC_ROOT."err_log.txt");

define("SITE_URL", "http://".$_SERVER["HTTP_HOST"]."/ebutler/"); 
define("ADMIN_URL", SITE_URL."admin/");

define("URL_404", SITE_URL."file-not-found/");
?>