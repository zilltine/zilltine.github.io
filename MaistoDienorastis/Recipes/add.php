<?php
session_start();
include '../conn.php';
$amount = json_decode($_POST['amount']);
$id = json_decode($_POST['id']);
$description = $_POST['description'];
$name = $_POST['name'];
$image = json_decode($_POST['image']);
$userId = $_SESSION['id'];
$name = str_replace("'", "`", $name);
$description = str_replace("'", "`", $description);
if ($image != "Uploads/default.jpg"){
	$base = explode(",", $image);
	$data = base64_decode($base[1]);
	$uniqid = 'Uploads/'.uniqid(). $name. ".jpg";
	file_put_contents($uniqid, $data);
	$query = "INSERT INTO recipes (users_id, name, instructions, img_id) VALUES ($userId, '$name', '$description', '$uniqid')";
	if (mysqli_query($conn, $query)){
		$lastId = mysqli_insert_id($conn);
	}
}
else {
	$query = "INSERT INTO recipes (users_id, name, instructions, img_id) VALUES ($userId, '$name', '$description', '$image')";
	if (mysqli_query($conn, $query)){
		$lastId = mysqli_insert_id($conn);
	}
}
$lastId = mysqli_insert_id($conn);
foreach ($id as $key => $value) {
	$query = "INSERT INTO ingredients (amount, recipes_id, products_id) VALUES($amount[$key], $lastId, $value)";
	if (mysqli_query($conn, $query)){
		
	}
}
("Location: recipe.php?id=$lastId;")
?>
<span id="redirect"><?php echo "recipe.php?id=". $lastId; ?> </span>
<script type="text/javascript">
	var link = document.getElementById('redirect').textContent;
	window.location = link;
</script>