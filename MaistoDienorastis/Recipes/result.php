<?php
include '../conn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript">
	$(document).ready(function(){
	$(".displayedIngredient").on('click',function(){
		var id = $(this).children('.thisId').val();
		var name = $(this).children('.thisName').text();
		var measureBy = $(this).children('.thisMeasureBy').text();
		$("#recipeForm").append(
							"<div class='ingredient'> "+
							"<input class='ingredientId' value='" + id+ "'></input>"+
							"<span class='ingredientName'>" + name + "</span>"+
							"<input class='ingredientAmount' type='number' placeholder='Iveskite Kieki' required>"+ measureBy+
							"<span class='removeIngredient'>X</span>"+
							"</div>"
							);
		$('#searchProduct').val("");
		$('#result').text("");
	});
});
</script>
</head>
<body>
<?php
$search = $_POST['search'];
$query = "SELECT * FROM products WHERE name LIKE '$search%'";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)){
	$productId = $row['id'];
	echo "<div class='displayedIngredient'>";
	foreach ($row as $key => $value){
		if ($key === "id"){
			echo "<input class='thisId' value ='". $value."'></input>";
		}
		if ($key === "name"){
			echo "<div class='thisName'>". $value."</div>";
		}
		if ($key === "kcal"){
			echo "<div class='thisKcal'>". $value." kcal</div>";
		}
		if ($key === "measure_by"){
			echo "<div class='thisMeasureBy'>". $value."</div>";
		}
	}
	echo "</div>";

}
?>

</body>
</html>