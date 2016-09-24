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
					$include_flag           =   true;
                    $include_page			=   "photo_wall.php";		
					$page_title				=	"Photo Wall";			
					break;
	case 'web':			
					$include_flag           =   true;
                    $include_page			=	"web_library.php";		
					$page_title				=	"Photo Wall";	
                    $web_types              =   $mainClassObj->getSchemaInfo($webTypes, "*", "", "", "", "", "");
                    $recently_added         =   $mainClassObj->getSchemaInfo($webLib, "*", "", "uri", "created_at", "DESC", "");
					break;	
	default:				
                    $include_flag           =   false;	
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
    	<div class="col-md-8 col-sm-8 col-xs-8">
    		<div class="news wrapper">
    			<div class="ribbon-wrapper-green">
    				<div class="ribbon-green" id="test">NEWS</div>
    			</div>
    			<p>This year’s Adult Christmas Party will be held on the evening of Saturday, December 3rd at Algonquin College (same venue as last year).  For the past 5 years, the Christmas Party format has been a dinner followed by a comedy show.</p>
    		</div>
    	</div>
    	<div class="col-md-4 col-sm-4 col-xs-4">
    		<div class="news">
    			<div> color change test </div>
    		</div>
    	</div>
  	</div>
    <div class="row">
        <div class="alert alert-info col-md-8 col-sm-8 col-xs-8" id="main_component_guide">
            <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>
            <span class="sr-only">Hint:</span>
                &nbsp;Double click on module below
        </div>
    </div>
  	<div class="row">
    	<div class="col-md-3 col-sm-6 col-xs-12">
    		<div class="main-component" >
    			<a href="admin_finance.php">
    				<img src="assets/img/linechart.png" alt="Finance"/>
    			</a>
    		</div>
    	</div>
    	<div class="col-md-3 col-sm-6 col-xs-12">
    		<div class="main-component" >
    			<a href="admin_home.php?option=photo">
    				<img src="assets/img/gallery.png" alt="Photo"/>
    			</a>
    		</div>
    	</div>
    	<div class="col-md-3 col-sm-6 col-xs-12">
    		<div class="main-component" >
    			<a href="admin_home.php?option=note">
    				<img src="assets/img/note.png" alt="Notes"/>
    			</a>
    		</div>
    	</div>
    	<div class="col-md-3 col-sm-6 col-xs-12">
    		<div class="main-component" >
    			<a id="to_webform" href="admin_home.php?option=web">
    				<img src="assets/img/web.png" alt="Userful Links"/>
    			</a>	
    		</div>
    	</div>
    	<div class="col-md-3 col-sm-6 col-xs-12">
    		<div class="main-component" >
    			<a href="admin_home.php?option=password">
    				<img src="assets/img/password.png" alt="Keychain"/>
    			</a>
    		</div>
    	</div>
  	</div>
  	<?php
        if($include_flag) {
             require "partials/".$include_page;
        } 
     ?>
    <div class="analyze-result row">
        <iframe src="" class="col-xs-12 analyze-result-window"></iframe>
        <span class="glyphicon glyphicon-chevron-down analyze-close" aria-hidden="true" style="position: absolute; right: 50px; top: 20px; font-size: 30px; cursor: pointer;"></span>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
<?php require "templates/admin_home_footer.php"; ?>