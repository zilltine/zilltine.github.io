<?php
include 'conn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript">
	$(document).ready(function(){
		$(".displayedRecipe").on('click',function(){
			var id = $(this).children('.thisId').val();
			var name = $(this).children('.thisName').text();
			$(this).parent().siblings('.selected').append(
								"<div class='addedRecipe'> "+
								"<input class='id' value='" + id+ "'></input>"+
								"<span class='recipeName'>" + name + "</span>"+
								"<input type='number' value='1' class='recipeAmount'> porc."+
								"<span class='remove'>X</span>"+
								"</div>"
								);
			$('.recipes').val("");
			$('.result').empty();
		});
	});
</script>
</head>
<body>
<?php
$search = $_POST['search'];
$query = "SELECT * FROM recipes WHERE name LIKE '%$search%' LIMIT 6";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)){
	$productId = $row['id'];
	echo "<div class='displayedRecipe'>";
	foreach ($row as $key => $value){
		if ($key === "id"){
			echo "<input class='thisId' value ='". $value."'></input>";
		}
		if ($key === "name"){
			echo "<div class='thisName'>". $value."</div>";
		}
	}
	echo "</div>";

}
?>

</body>
</html>