<?php
include 'conn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript">
	$(document).ready(function(){
		$(".displayedProduct").on('click',function(){
			var id = $(this).children('.thisId').val();
			var name = $(this).children('.thisName').text();
			var measure_by = $(this).children('.thisMeasure').text();
			$(this).parent().siblings('.selected').append(
								"<div class='addedProduct'> "+
								"<input class='id' value='" + id+ "'></input>"+
								"<span class='productsName'>" + name + "</span>"+
								"<input type='text' value='100' class='productsAmount'>"+measure_by+
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
$query = "SELECT * FROM products WHERE name LIKE '%$search%' LIMIT 6";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)){
	$productId = $row['id'];
	echo "<div class='displayedProduct'>";
	foreach ($row as $key => $value){
		if ($key === "id"){
			echo "<input class='thisId' value ='". $value."'></input>";
		}
		if ($key === "name"){
			echo "<div class='thisName'>". $value."</div>";
		}
		if ($key === "measure_by"){
			echo "<div class='thisMeasure'>". $value."</div>";
		}
	}
	echo "</div>";

}
?>

</body>
</html>