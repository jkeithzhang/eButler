<?php
####################################################################
#	File Name	:	admin_home.php
#	Location	:	/WEBROOT/admin/
####################################################################

require "templates/admin_home_header.php";

if(isset($_REQUEST['option']) && $_REQUEST['option'] != "") {
	$option_name = $_REQUEST['option'];
}

switch($option_name) {
	case 'finance':			
					$include_php			=	"finance.php";		
					$page_title				=	"My Finance";			
					break;
	default:				
					$include_php			=	"finance.php";		
					$page_title				=	"My Finance";			
					break;
}

// echo ">>>" . $include_php;
?>

<nav class="navbar navbar-default navbar-fixed-top">
 	<div class="container-fluid">
    	<img src="assets/img/logo.png" alt="Avatar"/> 
  	</div>
</nav>
<div class="container">
	<div class="row">
    	<div class="col-md-8 col-sm-8 col-xs-8">
    		<div class="alert wrapper">
    			<div class="ribbon-wrapper-green">
    				<div class="ribbon-green" id="test">NEWS</div>
    			</div>
    			<p>This year’s Adult Christmas Party will be held on the evening of Saturday, December 3rd at Algonquin College (same venue as last year).  For the past 5 years, the Christmas Party format has been a dinner followed by a comedy show.</p>
    		</div>
    	</div>
    	<div class="col-md-4 col-sm-4 col-xs-4">
    		<div class="alert">
    			<div> color change test </div>
    		</div>
    	</div>
  	</div>
  	<div class="row">
    	<div class="col-md-3 col-sm-6 col-xs-12">
    		<div class="main-component" >
    			<a href="admin_home.php?option=finance">
    				<img src="assets/img/linechart.png" alt="Finance"/>
    			</a>
    		</div>
    	</div>
    	<div class="col-md-3 col-sm-6 col-xs-12">
    		<div class="main-component" >
    			<a href="admin_home.php?option=photo">
    				<img src="assets/img/gallery.png" alt="Photos"/>
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
    			<a href="admin_home.php?option=web">
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
</div>
<!-- CONTENT-WRAPPER SECTION END-->
<?php require "templates/admin_home_footer.php"; ?>