<?php
include '../conn.php';
function showRecipe($row){
	$img = $row['img_id'];
	$name = $row['name'];
	$id = $row['id'];
	$instructions = $row['instructions'];
	echo "<div class='shownRecipe'>";
	echo "<img class='shownRecipeImg' src='". $img. "'>";
	echo "<h2>". $name. "</h2>";
	echo "<span class='shownId'> recipe.php?id=". $id. "</span>";
	echo "<span class='shownInstructions'>". $instructions. "</span>";
	echo "</div>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$search = $_POST['search'];
$query = "SELECT * FROM recipes WHERE name LIKE '$search%' LIMIT 12";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)){
	showRecipe($row);
}
 ?>
 <script type="text/javascript">
 	$('.shownRecipe').on('click', function(){
 		var link = $(this).find('.shownId').text();
 		console.log(link);
 		window.location = link;
 	});
 </script>
</body>
</html>
