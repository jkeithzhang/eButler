$(document).ready(function() {
	$('#loginLink').click(function(){	
		processSecureLogin();	
	});

	/* Simple VanillaJS to toggle class */
	document.getElementById('toggleProfile').addEventListener('click', function () {
	  [].map.call(document.querySelectorAll('.profile'), function(el) {
	    el.classList.toggle('profile--open');
	  });
	});
});

function processSecureLogin() {
	var loginValidated	=	true;
	var loginEmail		= 	$.trim($("#loginName").val());
	var loginPwd		= 	$.trim($("#loginPwd").val());
	var alertMsg		=	"";
	if(loginValidated) {
		//ajaxResponse
		var plainPwd	=	$("#loginPwd").val();
		var encPwd 		=	$.md5(plainPwd);
		$("#loginPwd").val(encPwd);			
		console.log($("#secureLoginForm").serialize());
		$.ajax({
			type: "POST",
			url: "ajax/ajax_secureLogin.php",
			data: $("#secureLoginForm").serialize(),
			success: function(ajaxResponse) {	
				var loginResponse	=	($.trim(ajaxResponse));
				if(loginResponse == 'SUCCESS') {
					alert("success");
					$(location).attr('href', 'admin_home.php');
					// $('#secureLoginForm').attr('action', 'admin_home.php');
				}
				else {
					//...
				}
			}
		});	//ajax
	} else {
		bootbox.alert(alertMsg, function() {	});	
	}
}