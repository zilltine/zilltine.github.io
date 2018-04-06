<?php
include 'conn.php';
$password = sha1($_POST['password']);
$username = $_POST['username'];
$query = "SELECT * FROM users WHERE username='$username'";
$check = mysqli_fetch_assoc(mysqli_query($conn, $query));
if ($username == $check['username'] && $password == $check['password']){
	session_start();
	$_SESSION['user']=$check['username'];
	$_SESSION['id']=$check['id'];
	echo "<script>setElements(true);
			</script>";
}
else {
	echo "Įvestas slaptažodis ir vartotojo vardas neatitinka";
}
?>