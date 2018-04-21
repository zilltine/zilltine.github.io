<?php
include 'conn.php';
$id = $_POST['id'];
$status = $_POST['status'];
// $query = "SELECT * FROM uzduotys WHERE id = $id";
// $result = mysqli_query($conn, $query);
// $row = mysqli_fetch_assoc($result);
if ($status === 'padaryta'){
	$query = "UPDATE uzduotys SET statusas = 'daroma' WHERE id = $id";
}
else {
	$query = "UPDATE uzduotys SET statusas = 'padaryta' WHERE id = $id";
}
if ($result = mysqli_query($conn, $query)){
}
?>