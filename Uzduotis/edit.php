<?php
include 'conn.php';
$id = $_POST['id'];
$value = $_POST['value'];
$query = "UPDATE uzduotys SET uzduotis = '$value' WHERE id = $id";
if ($result = mysqli_query($conn, $query)){
}

?>