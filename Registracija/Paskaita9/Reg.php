<?php
session_start();
$mysqli = mysqli_connect("localhost", "mpdelt_02", "IsmokKodint333", "mpdelt_02");
if (!$mysqli){
	echo "Error!";
}
$username = $_POST["username"];
$password = sha1($_POST["password"]);
$repeat = sha1($_POST["repeat"]);
$email = $_POST["email"];
$admin = $_POST["admin"];
if (!$admin){
	$admin=0;
}
var_dump($admin);
	?>
	<!--<form method ="post" action="Reg.php">-->
	<!--	<input type="text" name="username" placeholder="username" required />-->
	<!--	<input type="text" name="password" placeholder="password" required/>-->
	<!--	<input type="text" name="repeat" placeholder="repeat pasword" required/>-->
	<!--	<input type="email" name="email" placeholder="email" required/>-->
	<!--	<input type="submit" name="save" value="Register"/>-->
	<!--</form>-->
<?php
if ($repeat === $password){
	
	$sql = "INSERT INTO Users (username, password, email, Admin)
	VALUES ('$username', '$password', '$email', $admin)";
	if(mysqli_query($mysqli, $sql)){
	    echo "Registration was successfull!";
	    ?><script> window.location.href = "table.php" </script> <?php
	} else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
	}
}
else {
	echo "Passwords do not match!";
}
?>
<!--<script> window.location.href = "Register.php" </script>-->
	