<?php
session_start();
if (isset($_SESSION["loggedIn"])){
	$mysqli = mysqli_connect("localhost", "mpdelt_02", "IsmokKodint333", "mpdelt_02");
	if (!$mysqli){
		echo "Error!";
	}
	
		?>
	
			<div style = "float:left; width: 100px;"> ID </div>
			<div style = "float:left; width: 100px;"> USERNAME </div>
			<div style = "float:left; width: 100px;"> EMAIL </div>
			<div style = "float:left; width: 100px;"> CREATION DATE </div>
			<div style = "float:left; width: 100px;"> UPDATE DATE </div>	
			<div style="clear:both"> </div><?php
	$result = $mysqli->query("SELECT * FROM Users");
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		foreach ($row as $key => $item){
			if ($key != "password" && $key != "token" && $key != "Admin"){
			?>
				<div style = "float:left; width: 100px; overflow: hidden;"><?php echo $item ?></div><?php
			}
		}
		?>
		<div style="clear:both"> </div><?php
	}
	
	?>
	<a href="?logOut=1">Log Out</a>
	<a href="http://mpcode.puslapiai.lt/workspace/2/Login.php"> Back To Home</a>
	<?php
	if ($_GET["logOut"]==1){
		session_destroy();
		?><script> window.location.href = "http://mpcode.puslapiai.lt/workspace/2/Login.php" </script> <?php
	}
}
else {	
	?><script> window.location.href = "http://mpcode.puslapiai.lt/workspace/2/Login.php" </script> <?php	}

?>