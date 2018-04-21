<?php
include 'conn.php';
$id = $_POST['id'];
$uzduotis = $_POST['uzduotis'];
$query = "INSERT INTO uzduotys (uzduotis, statusas, users_id) VALUES ('$uzduotis', 'nauja', '$id')";
if ($result = mysqli_query($conn, $query)){
}

?>