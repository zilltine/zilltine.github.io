<?php
$conn = mysqli_connect('localhost', 'root', '', 'uzduotis');

if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
}
?>