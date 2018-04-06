$(document).ready(function(){
	$("#userLogin").submit(function(event){
		event.preventDefault();
		var username = $("#username").val();
		var password = $("#password").val();
		$("#message").load("../login.php", {
			username: username,
			password: password
		});
		$("#displayName").load("../Registration/session.php");
		 location.reload();	
	});
});
$(document).ready(function(){
	$("#logOut").click(function(){
		FB.getLoginStatus(function(response) {
		  	if (response.status === 'connected') {
		  		FB.logout(function(response){
					window.location.replace("../Registration/logout.php");
				});
			}
			else{
				window.location.replace("../Registration/logout.php");
			}
		});
	});
});