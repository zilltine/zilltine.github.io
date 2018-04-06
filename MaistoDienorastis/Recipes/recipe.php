<?php 
if (!$_GET['id']){
	//header('Location: ../');
}
session_start();
include '../conn.php';
$id=$_GET['id'];
$query = "SELECT * FROM recipes WHERE id=$id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$query = "SELECT * FROM ingredients WHERE recipes_id=$id";
$result = mysqli_query($conn, $query);
$userId = $row['users_id'];
$query = "SELECT username FROM users WHERE id=$userId";
$user =  mysqli_fetch_assoc(mysqli_query($conn, $query));
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $row['name'] ?></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav>
		<span id="displayName"><?php
			echo $_SESSION['user'];
			echo"      ";
			echo $_SESSION['id'];
			?>
		</span>
		<ul>
			<li><a href="../Ingredients/ingridients.php">Produktai</a><a href="add.php">Prideti</a></li>
			<li><a href="../index.php">Pagrindinis</a></li>
			<li><a href="addRecipe.php">Prideti Recepta</a></li>
			<li><a href="recipeSearch.php">Rasti Recepta</a></li>
		</ul>
	</nav>
	<main>
		<h2 id="recipeDisplayName"><?php echo $row['name'] ?></h2>
		<span>Sukurta <?php echo $user['username'] ?></span>
		<img id="displayImg" src="<?php echo $row['img_id'] ?>">
		<ul>
			<?php
			while ($ingredientsRow = mysqli_fetch_assoc($result)) {
				$id = $ingredientsRow['products_id'];
				$query = "SELECT name FROM products where id=$id";
				$result2 = mysqli_query($conn, $query);
				$product = mysqli_fetch_assoc($result2);
				echo "<li>";
				echo $product['name']. " - ". $ingredientsRow['amount'];
				echo "</li>";
			}
			?>
		</ul>
		<div id="recipeDescription"><?php echo $row['instructions']; ?></div>
	</main>
</body>
</html>