<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
include 'conn.php';
if (isset($_POST['register'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$repeat = $_POST['repeat'];
	$email = $_POST['email'];

	$errorEmptyUser = false;
	$errorEmptyPass = false;
	$errorEmptyEmail = false;
	$errorEmail = false;
	$errorRepeat = false;
	$emailTaken = false;
	$userTaken = false;

	if (empty($username)){
		$errorEmptyUser = true;
	}
	if (empty($password)){
		$errorEmptyPass = true;
	}
	if (empty($email)){
		$errorEmptyEmail = true;
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errorEmail	= true;
	}
	if ($password!=$repeat){
		$errorRepeat = true;
	}
	if ($errorEmptyUser === false & $errorEmptyPass === false & $errorEmptyEmail === false & $errorEmail === false & $errorRepeat === false){
			$q= "SELECT username FROM users WHERE username='$username'";
			$result = mysqli_query($conn, $q);
			$name = mysqli_fetch_assoc($result);
			if ($name['username']){
				$userTaken = true;
			}
			$mail = mysqli_fetch_assoc(mysqli_query($conn, "SELECT email FROM users WHERE email='$email'"));
			if ($mail['email']){
				$emailTaken = true;
			}
			if ($emailTaken === false && $userTaken === false){
				$pass=sha1($password);
				$query = "INSERT INTO users (password,email,username) 
				VALUES ('$pass','$email','$username')";
				if (mysqli_query($conn, $query)){
					session_start();
					$last_id = mysqli_insert_id($conn);
					$_SESSION['id']=$last_id;
					$_SESSION['user']=$username;
					echo "<script>location.replace('index.php');</script>";
				}
			}
	}
}
?>				
<script>
	var errorEmptyUser = "<?php echo $errorEmptyUser; ?>";
	var errorEmptyPass = "<?php echo $errorEmptyPass; ?>";
	var errorEmptyEmail = "<?php echo $errorEmptyEmail; ?>";
	var errorEmail = "<?php echo $errorEmail; ?>";
	var errorRepeat = "<?php echo $errorRepeat; ?>";
	var emailTaken = "<?php echo $emailTaken; ?>";
	var userTaken = "<?php echo $userTaken; ?>";

	 if (errorEmptyUser == true) {
	 	$("#usernameMessage").text("Prašome įvesti vartotojo vardą");
	 }
	 	 else if  (userTaken == true) {
		 		$("#usernameMessage").text("Šis vartotojo vardas jau yra užimtas");
			 }
			 else {
			 	$("#usernameMessage").text("");
	 }
	 if (errorEmptyPass == true) {
	 	$("#passwordMessage").text("Prašome įvesti slaptažodį");
	 }
	 else {
	 	$("#passwordMessage").text("");
	 }
	 if (errorEmail == true || errorEmptyEmail) {
	 	$("#emailMessage").text("Prašome įvesti tinkamą el. paštą");
	 }
		 else if  (emailTaken == true) {
		 		$("#emailMessage").text("Šis el. pašto adresas yra užimtas");
			 }
			 else {
			 	$("#emailMessage").text("");
			 }
	 if (errorRepeat == true) {
	 	$("#repeatMessage").text("Slaptažodžiai nevienodi!");
	 }
	 else {
	 	$("#repeatMessage").text("");
	 }
</script>
</body>
</html>
