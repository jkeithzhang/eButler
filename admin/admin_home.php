<?php
####################################################################
#	File Name	:	admin_home.php
#	Location	:	/WEBROOT/admin/
####################################################################

require "templates/admin_home_header.php";

if(isset($_REQUEST['option']) && $_REQUEST['option'] != "") {
	$option_name = $_REQUEST['option'];
}

# List Of Schemas
$webTypes = "web_types";
$webLib = "web_library";

switch($option_name) {
	case 'photo':			
                    $include_page			=   "photo_wall_edit.php";		
					$page_title				=	"Photo Wall";			
					break;
	case 'web':			
                    $include_page			=	"web_library_edit.php";		
					$page_title				=	"Web Lib";	
                    $web_types              =   $mainClassObj->getSchemaInfo($webTypes, "*", "", "", "", "", "");
                    $recently_added         =   $mainClassObj->getSchemaInfo($webLib, "*", "", "uri", "created_at", "DESC", "4");
					break;	
	default:				
                    $include_page           =   "admin_home_dashboard.php";     
                    $page_title             =   "Dashboard";	
					break;
}

// echo ">>>" . json_encode($recently_added);

?>
<nav class="navbar navbar-default navbar-fixed-top">
 	<div class="container-fluid">
    	<img src="assets/img/logo.png" alt="Avatar"/> 
  	</div>
</nav>
<div class="container">
	<div class="row">
        <div class="col-md-2 col-sm-6 col-xs-6">
            <div class="main-component" style="background-color: crimson">
                <a href="admin_finance.php">
                    <img src="assets/img/linechart.png" alt="Finance"/>
                </a>
                <hr/>
                <p class="main-component-description">FINANCE</p>
            </div>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6">
            <div class="main-component" style="background-color: dodgerblue;">
                <a  id="to_photo_wall_edit" href="admin_home.php?option=photo">
                    <img src="assets/img/gallery.png" alt="Photo"/>
                </a>
                <hr/>
                <p class="main-component-description">PHOTO WALL</p>
            </div>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6">
            <div class="main-component" style="background-color: coral;">
                <a href="admin_home.php?option=note">
                    <img src="assets/img/note.png" alt="Notes"/>
                </a>
                <hr/>
                <p class="main-component-description">NOTE</p>
            </div>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6">
            <div class="main-component" style="background-color: lightslategrey;">
                <a id="to_webform" href="admin_home.php?option=web">
                    <img src="assets/img/web.png" alt="Userful Links"/>
                </a>
                <hr/>
                <p class="main-component-description">URI LIBRARY</p>    
            </div>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6">
            <div class="main-component" style="background-color: mediumseagreen;">
                <a href="admin_home.php?option=password">
                    <img src="assets/img/password.png" alt="Keychain"/>
                </a>
                <hr/>
                <p class="main-component-description">KEYCHAIN</p>
            </div>
        </div>
    	<div class="col-md-2 col-sm-6 col-xs-6">
            <div class="news wrapper">
                <div class="ribbon-wrapper-green">
                    <div class="ribbon-green" id="test">NEWS</div>
                </div>
            <p>CentOS version on the current GitLab server is 6.6.</p>
            </div>
    	</div>
  	</div>

    <?php
        require "partials/".$include_page;
    ?>

    <div class="analyze-result row">
        <iframe src="" class="col-xs-12 analyze-result-window"></iframe>
        <span class="glyphicon glyphicon-chevron-down analyze-close" aria-hidden="true" style="position: absolute;right: 50px; top: 20px; font-size: 30px; cursor: pointer;"></span>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
<?php require "templates/admin_home_footer.php"; ?>