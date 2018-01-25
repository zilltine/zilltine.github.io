<?php
session_start();
$mysqli = mysqli_connect("localhost", "mpdelt_02", "IsmokKodint333", "mpdelt_02");
if (!$mysqli){
	echo "Error!";
}
$token = $_GET['token'];
$email = $_GET['email'];
$newpassword = sha1($_POST['newpassword']);
var_dump($newpassword);
$repeat = sha1($_POST['repeat']);
$sql = mysqli_query($mysqli, "SELECT * FROM Users WHERE token = '$token' AND email='$email'");
if ($row = mysqli_fetch_array($sql,  MYSQLI_ASSOC)){
	?>
<form method ="post">
	<input type="text" name="newpassword" placeholder="New Password" required/>
	<input type="text" name="repeat" placeholder="Repeat Password" required/>
	<input type="email" name="email" placeholder="email" required/>
	<input type="submit" name="save" value="Change Password"/>
</form>	<?php

	if  ($newpassword == $repeat && strlen($repeat) > 4) {
		$set = mysqli_query($mysqli, "UPDATE Users SET password='$newpassword' WHERE token = '$token' AND email='$email'");
		var_dump($set);
		echo "Password changed";
		?><a href="http://mpcode.puslapiai.lt/workspace/2/Login.php"> Back To Home</a><?php
	}
	else {
		echo "Password must be at least 5 symbols";
	}
}
else { echo" not";}
// if (mysqli_query($mysqli, $row)){
// 	var_dump($row);
// }
?>