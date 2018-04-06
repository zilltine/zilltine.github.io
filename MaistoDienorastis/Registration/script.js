$(document).ready(function(){
	$("#registrationForm").submit(function(event){
		event.preventDefault();
		var username = $("#usernameReg").val();
		var password = $("#passwordReg").val();
		var repeat = $("#repeatReg").val();
		var email = $("#emailReg").val();
		var register = $("#register").val();
		$("#message").load("validation.php", {
			username: username,
			password: password,
			repeat: repeat,
			email: email,
			register: register
		});
	});
});