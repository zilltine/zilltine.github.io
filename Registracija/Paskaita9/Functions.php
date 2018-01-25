<?php
session_start();
$mysqli = mysqli_connect("localhost", "mpdelt_02", "IsmokKodint333", "mpdelt_02");
if (!$mysqli){
	echo "Error!";
}
class Users{
public function sendEmail($email, $username){
	$mysqli = mysqli_connect("localhost", "mpdelt_02", "IsmokKodint333", "mpdelt_02");
	$sql = $mysqli->query("SELECT * FROM Users WHERE email='$email' AND username='$username'");
	$thisuser = mysqli_fetch_array($sql, MYSQLI_ASSOC);
	if ($thisuser["email"]==$email && $thisuser["username"]==$username){
		$token=sha1(rand(0,100000000000000000)."seedas-hggfuygyugt".date('Ymdhis'));
		mail ( $email , "Reset your account" , "to reset your account click on this link http://mpcode.puslapiai.lt/workspace/2/Paskaita9/change.php?token=".$token."&email=".$email);
		$sqlas = "UPDATE Users SET token='$token' WHERE email='$email'";
		if (mysqli_query($mysqli, $sqlas)){
			echo "YES2";
		}
		else { echo "ERROR: Could not able to execute $sqlas. " . mysqli_error($mysqli);
	    }
	}
	else if ($email){
		echo	"Could not find email associated to this account";
	}
	
}

public function logIn ($username, $password){
	$mysqli = mysqli_connect("localhost", "mpdelt_02", "IsmokKodint333", "mpdelt_02");
	$result = $mysqli->query("SELECT * FROM Users WHERE username='$username'");
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if ($row['password'] === $password && $row['username'] === $username){
		$_SESSION["loggedIn"] = $username;
		if ($row['Admin'] == 1){
			?><script> window.location.href = "Paskaita9/admin.php" </script> <?php
			$_SESSION['isAdmin'] = true;
		}
		else {
			?><script> window.location.href = "Paskaita9/table.php" </script> <?php
		}
	}
	else {
		echo "Could not find username with this password";
	}
}

public function add($username, $password, $email, $admin){
	$mysqli = mysqli_connect("localhost", "mpdelt_02", "IsmokKodint333", "mpdelt_02");
	$sql = "INSERT INTO Users (username, password, email, Admin)
	VALUES ('$username', '$password', '$email', $admin)";
	if(mysqli_query($mysqli, $sql)){
	} 
	else{
    	echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
	}
}

public function edit($id, $username, $email, $admin){
	$mysqli = mysqli_connect("localhost", "mpdelt_02", "IsmokKodint333", "mpdelt_02");
	$sql = "UPDATE Users SET username='$username', email='$email', Admin='$admin' WHERE id = '$id'";
	if(mysqli_query($mysqli, $sql)){
	} 
	else{
    	echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
	}
}

public function remove($id){
	$mysqli = mysqli_connect("localhost", "mpdelt_02", "IsmokKodint333", "mpdelt_02");
	$sql = ("DELETE FROM Users WHERE id=$id");
	if (mysqli_query($mysqli, $sql)){
	}
	else {
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
}
}
$users = new Users;
var_dump($_POST['msg']);
var_dump($id);
var_dump($username);
if ($_POST['msg'] == 'now'){
	$users->edit($id, $username, $email, $admin);
}
