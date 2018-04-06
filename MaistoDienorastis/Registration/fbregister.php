<?php
session_start();
include '../conn.php';
$fb_id = intval($_POST['fb_id']);
$email = $_POST['email'];
$username = $_POST['username'];
$_SESSION['user'] = $username;
$result = mysqli_query($conn, "SELECT * FROM users WHERE facebook_id=$fb_id");
$thisId = mysqli_fetch_assoc($result);
$_SESSION['id'] = $thisId['id'];
if (!$thisId['facebook_id'] == $fb_id){
	$query = "INSERT INTO users (facebook_id,email,username) 
	VALUES ($fb_id,'$email','$username')";
	if (mysqli_query($conn, $query)){
	}
}
?>
<span id="name"> <?php $_SESSION['user'] ?> </span>