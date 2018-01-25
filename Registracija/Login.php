<!DOCTYPE html>
<html>
<head>
	<title> Gamble Paradise</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
session_start();
if (isset($_SESSION["loggedIn"])){
	if ($row['Admin'] == 1){ 
		?><script> window.location.href = "Paskaita9/admin.php" </script> <?php	}
	else {	?><script> window.location.href = "Paskaita9/table.php" </script> <?php	}
}
include 'Paskaita9/Functions.php';
$mysqli = mysqli_connect("localhost", "mpdelt_02", "IsmokKodint333", "mpdelt_02");
if (!$mysqli){
	echo "Error!";
}
?>
<form method ="get">
	<input type="text" name="user" />
	<input type="text" name="pass" />
	<a href="http://mpcode.puslapiai.lt/workspace/2/Paskaita9/Register.php">REGISTER</a>
	<input type="submit" name="save" value="Log In"/>
</form>
<?php
$user = $_GET["user"];
$pass = sha1($_GET["pass"]);
if (isset($_GET['save'])) {
    $users->logIn($user, $pass);
}
?>
<button onclick="unhide()">Forgot Password?</button>
<div id="Forgot" class="hidden"><?php

$result = $mysqli->query("SELECT * FROM Users WHERE username='$user'");
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);


?>
<form method ="get">
	<input type="email" name="emailRecover" required placeholder="email"/>
	<input type="text" name="usernameRecover" required placeholder= "username"/>
	<input type="submit" name="save" value="Change Password"/>
</form>
<?php
$email = $_GET["emailRecover"];
$username = $_GET["usernameRecover"];
if (isset($_GET['save'])) {
	$users->sendEmail($email, $username);
}

?>

</div>
<script type="text/javascript" src="script.js"></script>
</body>