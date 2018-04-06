<?php
$conn = mysqli_connect('localhost', 'root', '', 'maisto_dienorastis');
// $conn = mysqli_connect('localhost', 'id5078027_root', 'allis3', 'id5078027_maisto_dienorastis');
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
}
?>