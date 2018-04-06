<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="navbar.css">
	<link rel="stylesheet" type="text/css" href="plan.css">
	<script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous">
	</script>
	<script type="text/javascript" src="plan.js"></script>
	<script type="text/javascript" src="login.js"></script>
	<script type="text/javascript" src="facebook.js"></script>
</head>
<body>
<nav>
	<div id="navholder">
		<a id="planuoti" href="#">PLANUOTI</a>
		<ul>
			<li>
				<a class= "hover menuItem" href="Ingredients/ingredients.php">Produktai</a>
				<div id="hoverMenu">
					<ul>
						<li><a class="menuItem" href="Ingredients/add.php">Pridėti Naują Produktą</a></li>
					</ul>
				</div>
			</li>
			<li>
				<a class="hover2 menuItem" href="recipes/recipeSearch.php">Receptai</a>
				<div id="hoverMenu2">
					<ul>
						<li><a class="menuItem" href="recipes/addRecipe.php">Pridėti Naują Receptą</a></li>
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
			<a class="menuItem" href="Registration/register.php">Registruotis</a>
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
<div id="sidebar">
</div>
<div id="leftBar">
	<span id="addBtn">+</span>
	<span id="previewPlan">Planuoti</span>
</div>
<main id="main">
	<div class="dayContainer">
		<div class="date">
			<input type="date" class="dateInput" value="<?php echo date('Y-m-d') ?>"><span class=".displayDate">labas</span>
		</div>
		<div class="breakfast">
			<input type="search" class="recipes" name=""><span>Rasti recepta</span>
			<input type="search" class="products" name=""><span>Rasti produktus</span>
			<div class="result">
			</div>
			<div class="selected">			
			</div>
		</div>
		<div class="lunch">
			<input type="search" class="recipes" name=""><span>Rasti recepta</span>
			<input type="search" class="products" name=""><span>Rasti produktus</span>
			<div class="result">
			</div>
			<div class="selected">			
			</div>
		</div>
		<div class="dinner">
			<input type="search" class="recipes" name=""><span>Rasti recepta</span>
			<input type="search" class="products" name=""><span>Rasti produktus</span>
			<div class="result">
			</div>
			<div class="selected">			
			</div>
		</div>
		<div class="snacks">
			<input type="search" class="recipes" name=""><span>Rasti recepta</span>
			<input type="search" class="products" name=""><span>Rasti produktus</span>
			<div class="result">
			</div>
			<div class="selected">			
			</div>
		</div>
	</div>
</main>
</body>
</html>