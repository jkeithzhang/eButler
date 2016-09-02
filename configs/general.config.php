<?php
####################################################################
#	File Name	:	general.config.settings
#	Location	: 	/WEBROOT/configs/
####################################################################

# Timezone
date_default_timezone_set("America/New_York");

# Obtaining Browser's Public IP
/*$externalIp	=		file_get_contents('http://phihag.de/ip/');
define("BROWSER_PUBLIC_IP", $externalIp);*/
define("BROWSER_PUBLIC_IP", $_SERVER['REMOTE_ADDR']);

# Mail Server Settings
define("SMTP_HOST", "");
define("SMTP_PORT", "");
define("SMTP_USER", "");
define("SMTP_PWD", "");

?>