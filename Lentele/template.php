
<html>
<head>
	<title> Matematieka</title>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/spacelab/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<textarea rows="4" cols="50" form="uzduotiesForma" name="aprasymas"> Aprasykite uzduoti</textarea><br><br>
<form method="post" id="uzduotiesForma">
	<input type="submit" name="button" value="Skelbti Uzduoti" name="button" class="btn btn-primary">
</form>
<form method="post">
	<input type="text" name="vardas" placeholder="Vardas" /><br><br>
	<input type="text" name="pavarde" placeholder="Pavarde" /><br><br>
	<input type="number" name="metai" placeholder="Gimimo metai" required /><br><br>
	<input type="number" name="ugis" placeholder="Ugis" /><br><br>
	<input type="number" name="svoris" placeholder="Svoris" /><br><br>
	<input type="radio" name="lytis" value=1 required> Moteris
	<input type="radio" name="lytis" value=2 > Vyras<br>
	<input type="checkbox" name="kmi"> Skaiciuti kmi
	<input type="checkbox" name="pensija"> Pensija?<br><br>
	<input type="submit" name="pateikti" value="Pateikti" class="btn btn-primary"/><br><br>
	<style="clear:both"></div>
</form>
<form method="get">
	<input type="number" name="uzduoties_id" placeholder="Pasirinkite Uzduoti">
	<input type="submit" name='isvedimas' value="Rodyti" class="btn btn-primary">
</form>

<?php
include 'functions.php';
if (isset($_GET['order'])){
	$order = $_GET['order'];
}
else {
	$order = 'id';
}
var_dump($_GET['sort']);
if (isset($_GET['sort'])){
	$sort = $_GET['sort'];
}
else {
	$sort = 'ASC';
}
		
$duomenys = new Duomenys;
$duomenys->isvestiLentele(intval($_GET['uzduoties_id']), $order, $sort);
if (isset($_POST['button'])){
	$duomenys->upload($_POST['aprasymas']);
}

if ($_POST['lytis']==2){
	$vyras = new Vyras($_POST['vardas'], $_POST['pavarde'], $_POST['metai'], $_POST['ugis'], $_POST['svoris']);
	if (isset($_POST['kmi'])){
		$vyras->kmi();
	}
	if (isset($_POST['pensija'])){
		$vyras->pensija();
	}
	
}

if ($_POST['lytis']==1){
	$moteris = new Moteris($_POST['vardas'], $_POST['pavarde'], $_POST['metai'], $_POST['ugis'], $_POST['svoris']);
	if (isset($_POST['kmi'])){
		$moteris->kmi();
	}
	if (isset($_POST['pensija'])){
		$moteris->pensija();
	}
}
?>
</body>