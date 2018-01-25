
<form method="post">
	<input type="number" name="x" placeholder="X">
	<input type="number" name="y" placeholder="Y">
	<input type="number" name="x2" placeholder="X2">
	<input type="number" name="y2" placeholder="Y2">
	<input type="number" name="x3" placeholder="X3">
	<input type="number" name="y3" placeholder="Y3">
	<input type="number" name="x4" placeholder="X4">
	<input type="number" name="y4" placeholder="Y4">
	<input type="submit" name="button" value="Set X, Y">
</form>
<form method="post">
	<input type="number" name="i" placeholder="Array Length">
	<input type="submit" name="button" value="Random array">
</form>
<?php

class Taskas {
	public $x;
	public $y;


	// public $array = array(
	// 	'x' => array(),
	// 	'y' => array()
	// 	);
	// public function __construct() {
 //       $argv = func_get_args();
 //       switch( func_num_args() ) {
 //           case 0:
 //               self::__construct0($argv[0]);
 //               break;
 //           case 1:
 //               self::__construct1( $argv[0], $argv[1] );
 //               break;
 //           case 2:
 //               self::__construct2( $argv[0], $argv[1], $argv[2] );
 //        }
 //   }
	// public function __construct0(){
	// 	$this->x = rand(-100, 100);
	// 	$this->y = rand(-100, 100);
	// }
	
	// public function __construct1($x){
	// 	$this->x = $x;
	// 	$this->y = rand(-100, 100);
	
	// }	
	
	public function __construct($x, $y){
		if (!empty($_POST['x'])){
			$x = $_POST['x'];
			settype($x, 'float');
		}
		else {
			$x = rand(-100, 100);
		}
		if (!empty($_POST['y'])){
			$y = $_POST['y'];
			settype($y, 'float');
		}
		else {
			$y = rand(-100, 100);
		}
		$this->x = $x;
		$this->y = $y;
		
	}	

};
$taskas1 = new Taskas($x, $y);
$taskas2 = new Taskas($x, $y);
$taskas3 = new Taskas($x, $y);
$taskas4 = new Taskas($x, $y);
if (!empty($_POST['x'])){
	$taskas1->x = $_POST['x'];
	settype($taskas1->x, 'float');
	}
if (!empty($_POST['y'])){
	$taskas1->y = $_POST['y'];
	settype($taskas1->y, 'float');
	}
if (!empty($_POST['x2'])){
	$taskas2->x = $_POST['x2'];
	settype($taskas2->x, 'float');
	}
if (!empty($_POST['y2'])){
	$taskas2->y = $_POST['y2'];
	settype($taskas2->y, 'float');
	}
if (!empty($_POST['x3'])){
	$taskas3->x = $_POST['x3'];
	settype($taskas3->x, 'float');
	}
if (!empty($_POST['y3'])){
	$taskas3->y = $_POST['y3'];
	settype($taskas3->y, 'float');
	}
if (!empty($_POST['x4'])){
	$taskas4->x = $_POST['x4'];
	settype($taskas4->x, 'float');
	}
if (!empty($_POST['y4'])){
	$taskas4->y = $_POST['y4'];
	settype($taskas4->y, 'float');
	}
$i=$_POST['i'];
settype($i, 'float');
$array = array(new Taskas($x, $y));
while (count($array)<$i){
	$taskas = new Taskas($x, $y);
	array_push($array, $taskas);
 }
class Skaiciavimai { 
	public function atstumas($taskas1, $taskas2){
		$x1=$taskas1->x;
		$y1=$taskas1->y;
		$x2=$taskas2->x;
		$y2=$taskas2->y;
		return sqrt(($x2-$x1)*($x2-$x1)+($y2-$y1)*($y2-$y1));
	}
	public function vertikali($taskas1, $taskas2){
		$x1=$taskas1->x;
		$y1=$taskas1->y;
		$x2=$taskas2->x;
		$y2=$taskas2->y;
		if ($y1!=$y2 && $x1==$x2){
			return true;
		}
		else { 
			return false;
			
		}
	}
	public function horizontali($taskas1, $taskas2){
		$x1=$taskas1->x;
		$y1=$taskas1->y;
		$x2=$taskas2->x;
		$y2=$taskas2->y;
		if ($y1==$y2 && $x1!=$x2){
			return true;
		}
		else { 
			return false;
			
		}
	}
	public function trikampis($taskas1, $taskas2, $taskas3){
		$AB = $this->atstumas($taskas1, $taskas2);
		$BC = $this->atstumas($taskas2, $taskas3);
		$AC = $this->atstumas($taskas1, $taskas3);
		if ($AB!=0 && $BC!=0 && $AC!=0){
			return $AB+$BC+$AC;
		}
		else {
			return false;
		}
	}
	public function arStatusis($taskas1, $taskas2, $taskas3){
		$AB = $this->atstumas($taskas1, $taskas2);
		$BC = $this->atstumas($taskas2, $taskas3);
		$AC = $this->atstumas($taskas1, $taskas3);
		$AB = round($AB*$AB, 5);
		$BC = round($BC*$BC, 5);
		$AC = round($AC*$AC, 5);
		if ($AB==($BC+$AC)){ 
			return true;
		}
		if ($AC==($BC+$AB)){
			return true;
		}
		if ($BC==($AC+$AB)){
			return true;
		}
		else {
			return false;
		}
	}
	
	public function staciakampis($taskas1, $taskas2, $taskas3, $taskas4){
		$trikampis[0] = $this->arStatusis($taskas1, $taskas2, $taskas3);
		$trikampis[1] = $this->arStatusis($taskas1, $taskas2, $taskas4);
		$trikampis[2] = $this->arStatusis($taskas1, $taskas3, $taskas4);
		$trikampis[3] = $this->arStatusis($taskas2, $taskas4, $taskas3);
		$sum=0;
		for ($i=0; $i<4; $i++){
			if ($trikampis[$i]){
				$sum++;
			}
		}
		if($sum>=2){
			return true;
		}
		else {
			return false;
		}
	}
	
	public function arKvadratas($taskas1, $taskas2, $taskas3, $taskas4){
		$AB = $this->atstumas($taskas1, $taskas2);
		$BC = $this->atstumas($taskas2, $taskas3);
		$CD = $this->atstumas($taskas3, $taskas4);
		$AD = $this->atstumas($taskas4, $taskas1);
		if ($AB==$BC && $AB==$CD && $CD==$BC && $this->staciakampis($taskas1, $taskas2, $taskas3, $taskas4)) {
			return true;
		}
		else {
			return false;
		}
	}
	public function masyvas($array){
		$max=0;
		for ($i=0; $i<count($array); $i++){
			for ($j=0; $j<count($array); $j++){
				$now = $this->atstumas($array[$i], $array[$j]);
				if ($now>$max){
					$max=$now;
				}
			}
		}
		return $max;
	}
	public function arTiese($taskas1, $taskas2, $taskas3){
		$x1=$taskas1->x;
		$y1=$taskas1->y;
		$x2=$taskas2->x;
		$y2=$taskas2->y;
		$x3=$taskas3->x;
		$y3=$taskas3->y;
		$Vienas=$x1/$y1;
		$Du=$x2/$x2;
		$Trys=$x3/$y3;
		var_dump($Vienas);
		var_dump($Du);
		var_dump($Trys);
		// $AB = $this->atstumas($taskas1, $taskas2);
		// $BC = $this->atstumas($taskas2, $taskas3);
		// $AC = $this->atstumas($taskas1, $taskas3);
		// if ($AB!=0 && $BC!=0 && $AC!=0){
		// 	return $AB+$BC+$AC;
		// }
		// else {
		// 	return false;
		}
}


$skaic = new Skaiciavimai;
$atstumas = $skaic->atstumas($taskas1, $taskas2);
echo "<br>";
echo "Atstumas yra: ";
var_dump($atstumas);
echo "<br><br>";
$vertikali = $skaic->vertikali($taskas1, $taskas2);
echo "Ar linijna vertikali? ";
var_dump($vertikali);
echo "<br><br>";
$horizontali = $skaic->horizontali($taskas1, $taskas2);
echo "Ar linijna horizontali? ";
var_dump($horizontali);
echo "<br><br>";
$trikampis = $skaic->trikampis($taskas1, $taskas2, $taskas3);
echo "Trikampio perimetras yra: ";
var_dump($trikampis);
echo "<br><br>";
$statusis = $skaic->arStatusis($taskas1, $taskas2, $taskas3);
echo "Ar trikampis statusis? ";
var_dump($statusis);
echo "<br><br>";
$staciakampis = $skaic->staciakampis($taskas1, $taskas2, $taskas3, $taskas4);
echo "Ar tai staciakampis? ";
var_dump($staciakampis);
echo "<br><br>";
$kvadratas = $skaic->arKvadratas($taskas1, $taskas2, $taskas3, $taskas4);
echo "Ar tai kvadratas? ";
var_dump($kvadratas);
echo "<br><br>";
$masyvas = $skaic->masyvas($array);
echo "Maksimalus atstumas yra: ";
var_dump($masyvas);
$skaic->arTiese($taskas1, $taskas2, $taskas3);