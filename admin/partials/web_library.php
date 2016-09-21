<div class="container" id="web_div">
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-6" id="web_div_left">
			<div>
		        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
		        <span class="sr-only">Hint:</span>
				<label>Recently added:</label>
			</div>
			<div id="recent_uri_container">
			    <table class="table">
			    	<thead>
			    		<tr>
			    			<th>Name</th>
			    			<th>Created @</th>
			    		</tr>
			    	</thead>
			    	<tbody>
					   	<?php
					    	foreach($recently_added as $key => $value) {
					    		echo "<tr><td><a href='". $value['uri'] . "' target='_blank'>" . $value['note'] . "</a></td><td>" . $value['created_at'] . "</td></tr>";
					    	}
						?>
			    	</tbody>
				</table>    					
			</div>
			<a name="id3"></a>
			<a class="btn btn-success" id="testiframe">Go to Inventory</a>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6" id="web_div_right">
			<form method="post" id="web_form">
				<div class="form-group">
			    	<label>URI</label>
			    	<input class="form-control" name="uri" id="uri" placeholder="Copy the link to here" required>
			  	</div>
				<div class="form-group">
			    	<label>CATEGORY</label>
			    	<select class="form-control" id="web_category_select" name="webtype[]" value="webtype" multiple="multiple" required>
			    		<?php
			    			foreach($web_types as $key => $value) {
			    				echo "<option name='" . "webtype" . "', value='" . $value['name'] . "'>" . $value['name'] . "</option>";
			    			}
						?>    	
			    	</select>
			  	</div>
			  	<div class="form-group">
			    	<label for="exampleTextarea">NOTE</label>
			    	<textarea class="form-control" name="note" value="note" id="note" rows="3" placeholder="Optional"></textarea>
			  	</div>
			  	<button id="web_submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>










