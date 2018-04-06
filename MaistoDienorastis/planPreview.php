<?php
session_start();
include 'conn.php';
$productId = $_POST['productId'];
$productAmount = $_POST['productAmount'];
$recipeId = $_POST['recipeId'];
$recipeAmount = $_POST['recipeAmount'];
// $productDate = $_POST['productDate'];
// $recipeDate = $_POST['recipeDate'];
$kcal = 0;
$protein = 0;
$carbs = 0;
$fat = 0;
$products = array();
foreach ($productId as $key => $value){
	if (isset($products[$value])) {
		$products[$value] = $products[$value] + $productAmount[$key];
	}
	else {
		$products[$value] = $productAmount[$key];
	}
}

foreach ($recipeId as $key => $value){
	$query = "SELECT * FROM ingredients WHERE recipes_id='$recipeId[$key]'";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($result)){
	$add = $row['amount']*$recipeAmount[$key];
		if (isset($products[$row['products_id']])) {
			$products[$row['products_id']] = $products[$row['products_id']] + $add;
		}
		else {
			$products[$row['products_id']] = $add;
		}
	}
}
?> <h3>Pirkinių Sąrašas</h3><?php
foreach ($products as $id => $amount){
	$query = "SELECT * FROM products WHERE id='$id'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	echo $row['name'];
	echo  " - ";
	echo $amount;
	echo  " ";
	echo $row['measure_by'];
	echo "<br>";
	$kcal += $amount/100*$row['kcal'];
	$protein += $amount/100*$row['protein'];
	$carbs += $amount/100*$row['carbs'];
	$fat += $amount/100*$row['fat'];
}
?>

<h3> Iš viso suvalgysite</h3>
<span class="consumedStats">Kalorijos: <?php echo $kcal; ?></span>
<span class="consumedStats">Baltymai: <?php echo $protein; ?></span>
<span class="consumedStats">Angliavandeniai: <?php echo $carbs; ?></span>
<span class="consumedStats">Riebalai: <?php echo $fat; ?></span>