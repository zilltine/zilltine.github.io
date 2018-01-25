<?php
session_start();
$mysqli = mysqli_connect("localhost", "mpdelt_02", "IsmokKodint333", "mpdelt_02");
if (!$mysqli){
	echo "Error!";
}
// $username = $_POST["username"];
// $password = sha1($_POST["password"]);
// $repeat = sha1($_POST["repeat"]);
// $email = $_POST["email"];
	?>
	<form method ="post" action="Reg.php">
		<input type="text" name="username" placeholder="username" required />
		<input type="text" name="password" placeholder="password" required/>
		<input type="text" name="repeat" placeholder="repeat pasword" required/>
		<input type="email" name="email" placeholder="email" required/>
		<input type="checkbox" name="admin" value=1 />
		<input type="submit" name="save" value="Register"/>
	</form>
	<a href="http://mpcode.puslapiai.lt/workspace/2/Login.php"> Back To Home</a>
 <?php
// if ($repeat === $password){
	
// 	$sql = "INSERT INTO Users (username, password, email)
// 	VALUES ('$username', '".$password."', '".$email."')";
// 	if(mysqli_query($mysqli, $sql)){
// 	    echo "Registration was successfull!";
// 	} else{
// 	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
// 	}
// }
// else {
// 	echo "Passwords do not match!";
// }
// ?>

	