<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous">
	</script>
	<script src="script.js"> </script>
</head>
<body>
	<div id="wrap">
		<img src="logo.png">
		<form id="registrationForm" method="post" action="validation.php">
			<input type="text" name="username" id="usernameReg" placeholder="Vardas"><p id="usernameMessage"></p>
			<input type="password" name="password" id="passwordReg" placeholder="Slaptažodis"><p id="passwordMessage"></p>
			<input type="password" name="repeat" id="repeatReg" placeholder="Pakartokite slaptažodį"><p id="repeatMessage"></p>
			<input type="email" name="email" id= "emailReg" placeholder="El. paštas"><p id="emailMessage"></p>
			<button type="submit" name="register" id="register">Registruotis</button>
			<p id="message"></p>
			<p class='keisti'> Prisijungti</p>
		</form>
		<form class='hidden' id="loginForm" method="post" action="login.php">
			<input type="text" name="username" id="username" placeholder="Vardas"><p id="usernameMessage"></p>
			<input type="password" name="password" id="password" placeholder="Slaptažodis"><p id="passwordMessage"></p>
			<button type="submit" name="register" id="login">Prisijungti</button>
			<p id="loginMessage"></p>
			<p class='keisti'> Registruotis</p>
		</form>
	</div>
</body>
</html>