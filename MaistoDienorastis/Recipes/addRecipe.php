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
	<script type="text/javascript" src="script.js"></script>
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
				<a class="hover2 menuItem" href="../recipes/recipeSearch.php">Receptai</a>
				<div id="hoverMenu2">
					<ul>
						<li><a class="menuItem" id="addRecipeMenu" href="../recipes/addRecipe.php">Pridėti Naują Receptą</a></li>
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
		<div id='wrapRecipe'>
			<div id='addIngredient'>
				<form method="post" action="tempRecipe.php" id="searchRecipe">
					<h3><i>1. </i>Pasirinkite naudojamus produktus</h3>
					<input type="search" name="searchProduct" id="searchProduct">
					<div id="result"></div>
				</form>
			</div>
			<div id="addRecipe">
				<h3><i>2. </i>Aprašykite savo receptą</h3>
				<form id="recipesForm" enctype="multipart/form-data">
					<h4>Produktų kiekis</h4>

					<div id="recipeForm">
					</div>

					<h4>Jūsų recepto pavadinimas</h4>
					<input type="text" name="name" id="recipeName" placeholder="Recepto Pavadinimas"><br><br><br>
					<h4>Aprašykite recepto instrukcijas</h4>
					<div id="areaButtons">
						<input type="button" id="bold" value="Paryškinti">
						<input type="button" id="italic" value="Pasviręs">
						<input type="button" id="underline" value="Pabrauktas">
						<input type="color" id="color">
						<input type="button" id="size" value="Dydis">
						<input type="button" id="ul" value="Sąrašas">
					</div>
					<iframe form="recipesForm" name="description" id="descriptionRichText"> </iframe>
					<h4>Pridėkite patiekalo nuotrauką</h4>

					<input type="file" id="file" name="file"><br>
					<img id="output"></img>
					<button type="submit" id="recipeButton">Peržiūrėti</button>
					<div id="errorMsg"></div>
				</form>

			</div>	
			<div id="recipePreviewWrap">
				<h3><i>3. </i>Peržiūrėkite prieš išsaugodami</h3>

				<div id="recipePreview"></div>
			</div>	
		</div>
	</main>
</body>
</html>