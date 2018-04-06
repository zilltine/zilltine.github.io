<?php session_start();
if (isset($_SESSION['user'])){ 
	echo "<script>var loggedIn = 'logged'</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ingridientai</title>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="../navbar.css">
	<script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous">
	</script>
	<script type="text/javascript" src="search.js"></script>
	<script type="text/javascript" src="login.js"></script>
	<script type="text/javascript" src="facebook.js"></script>
</head>
<body>
	<nav>
	<div id="navholder">
		<a id="planuoti" href="../plan.php">PLANUOTI</a>
		<ul>
			<li>
				<a class= "hover menuItem" href="../ingredients/ingredients.php">Produktai</a>
				<div id="hoverMenu">
					<ul>
						<li><a class="menuItem" id="addProductMenu" href="../ingredients/add.php">Pridėti Naują Produktą</a></li>
					</ul>
				</div>
			</li>
			<li>
				<a class="hover2 menuItem" href="#">Receptai</a>
				<div id="hoverMenu2">
					<ul>
						<li><a class="menuItem" id="addRecipeMenu" href="addRecipe.php">Pridėti Naują Receptą</a></li>
					</ul>
				</div>
			</li>
		</ul>
		<div id="login">
			<form method="post" id="userLogin" action="login.php">
				<input type="text" name="username" id="username" placeholder="Vartotojas">
				<input type="password" name="password" id="password" placeholder="Slpatažodis">
				<button type="submit" name="login">Prisijungti</button>
			</form>
			<fb:login-button 
			  scope="public_profile,email"
			  onlogin="checkLoginState();">
			</fb:login-button>
			<a class="menuItem" href="../Registration/register.php">Registruotis</a>
			<br>
			<span>
				<span id="message"></span>
			</span>
		</div>
		<div id="loggedIn">
		<span id="displayName"><?php
			if (isset($_SESSION['user'])){
				echo $_SESSION['user'];
			}
			?>
		</span>
		<button id="logOut">Atsijungti</button>
		</div>
	</div>
</nav>
	<main>

		<form method="post" action="result.php" id="searchForm">
			<span>Suraskite receptą</span><br>
			<input type="search" name="search" id="search">
			<div id="recipeResult"></div>
		</form>
	</main>
</body>
</html>