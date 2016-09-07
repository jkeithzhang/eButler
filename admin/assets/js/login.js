/* Simple VanillaJS to toggle class */
document.getElementById('toggleProfile').addEventListener('click', function () {
  [].map.call(document.querySelectorAll('.profile'), function(el) {
    el.classList.toggle('profile--open');
  });
});

$(document).ready(function() {
	$('#loginLink').click(function(){	processSecureLogin();	});
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
			url: 	"Ajax/ajx_secureLogin.php",
			data: 	$("#secureLoginForm").serialize()+
					"&op_command=SECURE_LOGIN",
			success: function(ajaxResponse){
				
					var loginResponse	=	($.trim(ajaxResponse));
					var responseAlert	=	"";
					if(loginResponse == 'SUCCESS')
					{
						$(location).attr('href' ,'restaurant_owner_home.php');
						//$('#secureLoginForm').attr('action', 'restaurant_owner_home.php');
					}
					else
					{
						resetForm('secureLoginForm');
						
						switch(loginResponse)
						{
							case 'ACCOUNT_NOT_ENABLED':	responseAlert	=	"<font color='red'>&raquo; Your account is not active. Please contact administrator!</font>"; break;
							case 'EMAIL_NOT_VERIFIED':	responseAlert	=	"<font color='red'>&raquo; Your email is not verified. Please contact administrator!</font>"; break;
							case 'INVALID_CREDENTIALS':	responseAlert	=	"<font color='red'>&raquo; Access Denied:: Invalid Login Credentials!</font>"; break;
							default: responseAlert	=	"<font color='red'>&raquo; "+loginResponse+"</font>"; break;
						}
						
						bootbox.alert(responseAlert, function() {	});
						
					}
				},//success
		});	//ajax
	}
	else
	{
		bootbox.alert(alertMsg, function() {	});	
	}
}