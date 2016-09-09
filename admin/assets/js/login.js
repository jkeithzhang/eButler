/* Simple VanillaJS to toggle class */
document.getElementById('toggleProfile').addEventListener('click', function () {
  [].map.call(document.querySelectorAll('.profile'), function(el) {
    el.classList.toggle('profile--open');
  });
});

$(document).ready(function() {
	$('#loginLink').click(function(){	
		processSecureLogin();	
	});
});

function processSecureLogin(keyCode) {
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
			data: $("#secureLoginForm").serialize() + "&op_command=SECURE_LOGIN",
			success: function(ajaxResponse) {	
				var loginResponse	=	($.trim(ajaxResponse));
				var responseAlert	=	"";
				if(loginResponse == 'SUCCESS') {
					$(location).attr('href' ,'admin_home.php');
					//$('#secureLoginForm').attr('action', 'restaurant_owner_home.php');
				}
				else {
					
				}
			},//success
			error: function() {
				console.log('err');
			}
		});	//ajax
	} else {
		bootbox.alert(alertMsg, function() {	});	
	}
}