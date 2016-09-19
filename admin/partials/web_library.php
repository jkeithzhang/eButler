<div id="web_div">
	<form method="post" id="web_form">
		<div class="form-group">
	    	<label>URI</label>
	    	<input class="form-control" name="uri" id="uri" placeholder="Copy the link to here" required>
	  	</div>
		<div class="form-group">
	    	<label for="exampleSelect1">CATEGORY</label>
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
	  	<button id="web_submit" class="btn btn-primary">Submit</button>
	</form>
</div>