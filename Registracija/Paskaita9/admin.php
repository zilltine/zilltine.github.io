<!DOCTYPE html>
<html>
<head>
	<title> Gamble Paradise</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script
	  src="https://code.jquery.com/jquery-3.2.1.min.js"
	  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	  crossorigin="anonymous"></script>

</head>
<body>
<?php
session_start();
include 'Functions.php';
if (isset($_SESSION["loggedIn"])){
	if ($_SESSION['isAdmin'] == true){
		$mysqli = mysqli_connect("localhost", "mpdelt_02", "IsmokKodint333", "mpdelt_02");
		if (!$mysqli){
			echo "Error!";
		}
			?>
			
			<div><a href="http://mpcode.puslapiai.lt/workspace/2/Login.php"> Back To Home</a></div>
			<div id="table">
				<div style = "float:left; width: 100px;"> ID </div>
				<div style = "float:left; width: 100px;"> USERNAME </div>
				<div style = "float:left; width: 100px; overflow: hidden;"> PASSWORD </div>
				<div style = "float:left; width: 100px;"> EMAIL </div>
				<div style = "float:left; width: 100px;"> CREATION DATE </div>
				<div style = "float:left; width: 100px;"> UPDATE DATE </div>	
				<div style = "float:left; width: 100px;"> IS ADMIN </div>
				<div style = "float:left; width: 100px;"> TOKEN </div>
				<div style="clear:both"> </div><?php
			$result = $mysqli->query("SELECT * FROM Users LIMIT 20");
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				?>
				<form method ="post" style = "display: inline-block; float:left;"><?php
				foreach ($row as $key => $item){
					?>
					<input style="float:left; width: 100px; overflow: hidden;" type ='text' value ='<?php echo $item;?>' name='<?php echo $key;?>' ><?php
					?>
					<?php
					}
					?>
				<input type='submit' name='edit' class='edit' value='Edit'>
				<input type='submit' name='remove' class='remove' value='Remove'>
				</form>	
				<div style="clear:both"> </div><?php 
		}
			?></div><?php
		$id = $_POST['id'];
		$username = $_POST['username'];
		$password = sha1($_POST['password']);
		$email = $_POST['email'];
		$admin = $_POST['Admin'];
		if (!$admin){
			$admin=0;
		}
		else {$admin = 1;}
		// if (isset($_POST['edit'])) {
		//     $users->edit($id, $username, $email, $admin);
		// }
	
		$user = $_POST["user"];
		$pass = sha1($_POST["pass"]);
		$mail = $_POST["mail"];
		$isAdmin = $_POST["isAdmin"];
		if (!$isAdmin){
			$isAdmin=0;
		}
		else {$isAdmin = 1;}
		if (isset($_POST['add'])) {
		    $users->add($user, $pass, $mail, $isAdmin);
		}
		if (isset($_POST['remove'])) {
		    $users->remove($id);
		}?>
		<form method="post">
		 <table>
	        <thead>
	            <tr>
	                <th>USERNAME</th>
	                <th>PASSWORD</th>
	                <th>EMAIL</th>
	                <th>IS ADMIN</th>
	            </tr>
	        </thead>
	            <tr>
	            	<td><input type="text" name="user"></td>
	                <td><input type="text" name="pass"></td>
	                <td><input type="text" name="mail"></td>
	                <td><input type="checkbox" name="isAdmin"></td>
					<td><input type="submit" name="add" class="add" value="ADD"></td>
				</tr>  
		</form>
		</table>
	<a href="?logOut=1">Log Out</a>
	<a href="http://mpcode.puslapiai.lt/workspace/2/Login.php"> Back To Home</a>
	<?php
	if ($_GET["logOut"]==1){
		session_destroy();
		?><script> window.location.href = "http://mpcode.puslapiai.lt/workspace/2/Login.php" </script> <?php
	}?>
	<script type="text/javascript" src="script.js"></script><?php
	}

	else { ?> <script> window.location.href = "table.php" </script> <?php
	}
}
else 
{	
	?><script> window.location.href = "http://mpcode.puslapiai.lt/workspace/2/Login.php" </script> <?php	}

	?>
	</body>