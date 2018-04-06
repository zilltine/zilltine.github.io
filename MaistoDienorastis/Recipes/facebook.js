
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
	if(isLoggedIn || loggedIn == "logged"){
		document.getElementById('login').style.display = 'none';
		document.getElementById('logOut').style.display = 'inline-block';
		document.getElementById('displayName').style.display = 'inline-block';
		document.getElementById('addProductMenu').style.display = 'inline-block';
		document.getElementById('addRecipeMenu').style.display = 'inline-block';
	} 
	else {
		document.getElementById('login').style.display = 'inline-block';
		document.getElementById('logOut').style.display = 'none';
		document.getElementById('displayName').style.display = 'none';
		document.getElementById('addProductMenu').style.display = 'none';
		document.getElementById('addRecipeMenu').style.display = 'none';
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
			$.post("../Registration/fbregister.php", {
					username: user,
					fb_id: id,
					email: email
			});
			$("#displayName").load("../Registration/session.php");
		}
	});
}
