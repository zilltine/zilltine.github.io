<?php
session_start();
var_dump($_SESSION["loggedIn"]);
$mysqli = mysqli_connect("localhost", "mpdelt_02", "IsmokKodint333", "mpdelt_02");
if (!$mysqli){
	echo "Error!";
}
// <!--DELETE FROM table_name-->
// <!--WHERE some_column = some_value-->
$id = $_POST["id"];
var_dump($id);

$sql = ("DELETE FROM Users WHERE id=$id");
if (mysqli_query($mysqli, $sql)){
	echo "success";
	 ?> <a href="admin.php"> BACK</a> <?php
}
else {
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
	 ?> <a href="admin.php"> BACK</a> <?php
}