<?php
include 'conn.php';
$id = $_POST['id'];
$value = $_POST['value'];
$query = "DELETE FROM uzduotys WHERE id = $id";
if ($result = mysqli_query($conn, $query)){
}

?>