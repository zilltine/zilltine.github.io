<?php
include 'conn.php';
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM users WHERE username = '$username' ";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($user['password'] === sha1($password)){
	session_start();
	$_SESSION['id'] = $user['id'];
	echo "<script>location.replace('index.php');</script>";
}
else {
	echo "Slaptažodis ir vartotojo vardas neatitinka";

}
?>