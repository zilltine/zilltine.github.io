<?php
include '../conn.php';
$search = $_POST['search'];
$query = "SELECT * FROM products WHERE name LIKE '$search%' LIMIT 15";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result)==0) {
	echo "Nieko neradome. Ieškokite kitų ingridientų.";
}
while ($row = mysqli_fetch_assoc($result)){
	foreach ($row as $key => $value){
		if ($key == 'name'){
			echo "<div class='product'> <span class='productName'>". $value."</span>";
		}
		if ($key == 'kcal'){
			echo "Kalorijos - ";
			echo "<span class='productInfo'>". $value."</span>";
		}
		if ($key == 'protein'){
			echo "Baltymai - ";
			echo "<span class='productInfo'>". $value."</span>";
		}
		if ($key == 'carbs'){
			echo "Angliavandeniai - ";
			echo "<span class='productInfo'>". $value."</span>";
		}
		if ($key == 'fat'){
			echo "Riebalai - ";
			echo "<span class='productInfo'>". $value."</span>";
		}
	}
	echo "</div>";
}
?>