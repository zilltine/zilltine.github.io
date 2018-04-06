<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous">
	</script>
	<script src="script.js" defer> </script>
</head>
<body>
<script src="facebook.js"></script>
<div id="background">	
</div>
	<div id="wrap">
		<div id="fbLogIn" class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false" onlogin="checkLoginState();"></div>
		<form id="registrationForm" method="post" action="validation.php">
			<input type="text" name="username" id="usernameReg" placeholder="Vardas"><p id="usernameMessage"></p>
			<input type="password" name="password" id="passwordReg" placeholder="Slaptažodis"><p id="passwordMessage"></p>
			<input type="password" name="repeat" id="repeatReg" placeholder="Pakartokite slaptažodį"><p id="repeatMessage"></p>
			<input type="email" name="email" id= "emailReg" placeholder="El. paštas"><p id="emailMessage"></p>
			<button type="submit" name="register" id="register">Registruotis</button>
			<p id="message"></p>
		</form>
	</div>
</body>
</html>