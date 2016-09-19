$(document).ready(function() {
	$('#web_submit').click(function(){	
		addToWeb(13);	
	});

	$("#secureLoginForm input").keypress(function(e) {
	    if (e.which == 13) {
	        event.preventDefault();
	        addToWeb(13);	
	    }
	});
});
$('#web_category_select').select2();

function addToWeb(keycode) {
	if(keycode == 13) {
		var inputValidated	=	true;
		var uri				= 	$.trim($("#uri").val());
		var note			= 	$.trim($("#note").val());
		var webCategories = [];
		$('#web_category_select :selected').each(function(i, selected){ 
		  webCategories[i] = $(selected).text(); 
		});	

		var alertMsg = "";		
		if(uri == "") {
			inputValidated = false;
			alertMsg	+= "<br>";
			alertMsg	+=	"<font color='red'>&raquo; URI Required.</font>";
		}
		if(webCategories.length == 0) {
			inputValidated = false;
			alertMsg	+= "<br>";
			alertMsg	+=	"<font color='red'>&raquo; Categories Required.</font>";
		}	

		if(inputValidated) {
			$.ajax({
				type: "POST",
				url: "ajax/ajax_webSubmit.php",
				data: {
					webCategories: webCategories,
					uri: uri,
					note: note
				},
				success: function(ajaxResponse) {	
					alert('wtf');
					var addResponse	=	($.trim(ajaxResponse));
					if(addResponse == 'SUCCESS') {
						$(location).attr('href', 'admin_home.php');
					} else {
						//...
					}
				}
			});	//ajax
		} else {
			bootbox.alert(alertMsg, function() {	});	
		}
	}
}