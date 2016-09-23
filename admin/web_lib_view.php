<?php
####################################################################
#	File Name	:	web_lib_view.php
#	Location	:	/WEBROOT/admin/
####################################################################

require "templates/web_lib_header.php";

# List Of Schemas
$webTypes = "web_types";
$webLib = "web_library";

$weblibs = $mainClassObj->getSchemaInfo($webLib, "*", "", "", "created_at", "", "");

echo json_encode($weblibs);
?>
<nav class="navbar navbar-default navbar-static-top" style="border-bottom-width:0;background-color:#efefef;">
	<div class="col-md-8" style="padding-top: 10px">
		<span style=" font-size: 25px;color: #ccc;margin:auto;font-family: Open Sans">Web Library</span>	
	</div>
</nav>

<div class="container">
	<div class="row">	
		<div class="col-md-12">
			<table class="table table-striped">
	  			<thead>
	  				<tr>
	  					<th>Name</th>
	  					<th>Category</th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  				<?php
					    foreach($weblibs as $key => $value) {
					    	echo "<tr><td><a href='". $value['uri'] . "' target='_blank'>" . $value['note'] . "</a></td><td>" . $value['created_at'] . "</td></tr>";
					    }	  					
	  				?>
	  			</tbody>
			</table>
		</div>	
	</div>
</div>

<!-- CONTENT-WRAPPER SECTION END-->
<?php require "templates/admin_home_footer.php"; ?>