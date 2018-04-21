<?php
session_start();
if (!isset($_SESSION['id'])){
	header("Location: register.php");
}
include 'conn.php';
$id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE id = '$id' ";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous">
	</script>
	<script src="search.js"> </script>
</head>
<body>
	<div id="panel">
		<span id="loggedUser"><?php echo $user['username']; ?></span>
		<button onclick="window.location.replace('logOut.php');" id="logOut">Atsijungti</button>
	</div>
	<img id="logo" src="logo.png">
<?php
if ($user['is_admin'] == 1){
?>

	<div id="searchField">
		<input type="search" id="search" placeholder="Vartotojų paieška">
		<div id="result">
		</div>
		<div id="shownUser">
		</div>	
	</div>
	<div id="display"> <h1>Pasirinkite vartotoją</h1></div>
	<?php
	}
	else {
		?>
		<div id="display"> <h1><?php echo $user['username']; ?></h1>
			<hr>
			<h2> Mano užduotys</h2>
			<ul>
			<?php 
			$query = "SELECT * FROM uzduotys WHERE users_id = $id";
			$result = mysqli_query($conn, $query);
			while ($row = mysqli_fetch_array($result)){
				echo "<li> <span class='uzduotisVal'>". $row['uzduotis']. "</span>";
				echo "<span class='status' style='display:none;'>". $row['statusas']."</span>";
				echo "<span id='taskId' style='display:none;'>". $row['id']."</span>";
				echo '<i class="fas fa-check"></i>';
				echo "</li>";
			}

	?>
		
	</ul>
		</div>
		

	<?php
	}
	?>
	<script type="text/javascript">
		function zymeti(){
			$('.status').each( function(){
				var status = $(this).html()
				var tetis = $(this).parent()[0];
				if (status === 'padaryta'){
					$(tetis).addClass('checked');
				}
			});
			console.log("nuspalvinau");
		};
		zymeti();
	</script>
</body>
</html>
