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
	var loginEmail		= 	$.trim($("#loginEmail").val());
	var loginPwd		= 	$.trim($("#loginPwd").val());
	var actualTotal		=	parseInt($('.rand1').html())+parseInt($('.rand2').html());
	var sumResult		=	$('#sumResult').val();
	var alertMsg		=	"";
	if(loginValidated)
	{
		//ajaxResponse
		var plainPwd	=	$("#loginPwd").val();
		var encPwd 		=	$.md5(plainPwd);
		$("#loginPwd").val(encPwd);	
		
		var formData = new FormData($("#secureLoginForm")[0]);
		formData.append("op_command", "SECURE_LOGIN");
		
		$.ajax({
			type: "POST",
			url: "ajax/ajx_secureLogin.php",
			data: $("#secureLoginForm").serialize() + "&op_command=SECURE_LOGIN",
			success: function(ajaxResponse) {	
					var loginResponse	=	($.trim(ajaxResponse));
					var responseAlert	=	"";
					if(loginResponse == 'SUCCESS') {
						$(location).attr('href' ,'restaurant_owner_home.php');
						//$('#secureLoginForm').attr('action', 'restaurant_owner_home.php');
					}
					else {
						
					}
				},//success
		});	//ajax
	}
	else
	{
		bootbox.alert(alertMsg, function() {	});	
	}
}