
window.fbAsyncInit = function() {
FB.init({
	  appId      : '1956241771291846',
	  cookie     : true,
	  xfbml      : true,
	  version    : 'v2.12'
	});
	FB.getLoginStatus(function(response) {
	    statusChangeCallback(response);
	});
};

(function(d, s, id){
 var js, fjs = d.getElementsByTagName(s)[0];
 if (d.getElementById(id)) {return;}
 js = d.createElement(s); js.id = id;
 js.src = "https://connect.facebook.net/en_US/sdk.js";
 fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function statusChangeCallback(response){
	if (response.status === 'connected'){
		addFb();
		setElements(true);
	} else {
		setElements(false);
	}
}

function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}

function setElements(isLoggedIn){
	if(isLoggedIn){
		document.getElementById('fbLogIn').style.display = 'none';
		document.getElementById('logOut').style.display = 'block';
	} 
	else {
		document.getElementById('fbLogIn').style.display = 'block';
		document.getElementById('logOut').style.display = 'none';
	}
}

function logOut(){
	FB.logout(function(response){
		setElements(false);
	});
}

function addFb(){
	FB.api('/me?fields=name,email', function(response){
		if (response && !response.error){
			var user = response.name;
			var email = response.email;	
			var id = response.id;
			$('#message').load("fbregister.php", {
					username: user,
					fb_id: id,
					email: email
			});
		}
	});
}
