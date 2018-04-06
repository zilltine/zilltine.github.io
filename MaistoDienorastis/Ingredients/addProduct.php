<?php
session_start();
include '../conn.php';
$name = $_POST['name'];
$kcal = $_POST['kcal'];
$carbs = $_POST['carbs'];
$errors = 0;

if (empty($_POST['kcal'])){
	echo "Įveskite produkto kalorijas <br>";
	$errors++;
}
if (empty($_POST['name'])){
	echo "Įrašykite produkto pavadinimą";
	$errors++;
}
if (empty($_POST['carbs'])){
	$carbs = 0;
}
$fat = $_POST['fat'];
if (empty($_POST['fat'])){
	$fat = 0;
}
$protein = $_POST['protein'];
if (empty($_POST['protein'])){
	$protein = 0;
}
$measure_by = $_POST['measure_by'];
if (empty($_POST['measure_by'])){
	$measure_by = "g";
}
$users_id = $_SESSION['id'];
if ($errors < 1){
$query= "INSERT INTO products (name, kcal, carbs, fat, protein, users_id, measure_by) VALUES ('$name', $kcal, $carbs, $fat, $protein, $users_id, '$measure_by')";
	if ($result = mysqli_query($conn, $query)){
		echo "Produktas sėkmingai pridėtas";
	}
	else {
		echo $query;
	}
}
?>