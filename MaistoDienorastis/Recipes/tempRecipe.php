<!DOCTYPE html>
<?php
$amount = $_POST['amount'];
$id = $_POST['id'];
$description = $_POST['description'];
$name = $_POST['name'];
$ingredientName = $_POST['ingredientName'];
if (!empty($_POST['image'])){
	$image = $_POST['image'];
}
else {
	$image = "Uploads/default.jpg";
}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div>
	<span id="display"></span>
	<h2 id="test"><?php echo $name;?></h2>
		<br>
	<h3>Ingridientai</h3>
	<img id="displayImg" src="<?php echo $image ?>">
	<ul id="list">
	<?php
		foreach ($id as $key => $value) {
			echo "<li>";
			echo $ingredientName[$key]. " - ". $amount[$key];
			echo "</li>";
		}
	?>
	</ul>
	<h3>Aprašymas</h3>
	<span id="description"><?php echo $description; ?></span>
</div>
<button id="saveRecipe">Išsaugoti receptą</button>
<script>
	$(document).ready(function(){
		$("#saveRecipe").on("click", function(){
			var amount = '<?php echo json_encode($amount) ?>';
			var id = '<?php echo json_encode($id) ?>';
			var name = $("#test").text();
			var description = $("#description").text();
			var image = '<?php echo json_encode($image) ?>';
			$('#display').load('add.php', {
				amount : amount,
				id : id,
				description : description,
				name : name,
				image : image
			});
		});
	});
</script>
</body>
</html>
