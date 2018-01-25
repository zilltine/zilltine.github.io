<?php
include 'Masyvai.php';
$dvimatis = array (
	array(1, -15, 45, 5, -10, 40, 10),
	array(30, 15, 45, 5, 10, -40, 35, 10)
	);
$daugiaumatis = array (
	array(1, 2, 3),
	array(2, 2, 1),
	array(3, 1, 4)
	);
$masyvas = array(30, 15, 45, -5, 10, 35, -10);
$masyvas2 = array(-30, -15, 45, 5, -10, 40, 35, 10);
$masyvai = new Masyvai;
echo "Cia yra dvimatis masyvas: <br>";
$masyvai->spausdinam($dvimatis);
echo "<br><br> Cia yra pirmas masyvas: <br>";
$masyvai->spaudziam($masyvas);
echo "<br><br> Cia yra antras masyvas: <br>";
$masyvai->spaudziam($masyvas2);
echo "<br><br> Cia yra pirmo masyvo vidurkis: <br>";
$vidurkis = $masyvai->vidurkis($masyvas);
echo $vidurkis;
echo "<br><br> Cia yra skirtumas tarp didziausio ir maziausio elementu: <br>";
$skirtumas = $masyvai->skirtumas($masyvas);
echo $skirtumas;
echo "<br><br> Cia yra 1-5 <br>";
$vienasP = $masyvai->init(10);
$masyvai->spaudziam($vienasP);
echo "<br>";
$rez =  $masyvai->vienasPenki($vienasP);
$masyvai->spaudziam($rez);
var_dump($rez);
echo "<br><br> Cia tikrinam ar vienodas elementu kiekis <br>";
$tikrinam = $masyvai->lyginam($masyvas, $masyvas2);
echo $tikrinam;
echo "<br><br> Cia spausdinam 2 sujungtus ir surusiuotus masyvus <br>";
$jungti = $masyvai->jungiam($masyvas, $masyvas2);
$masyvai->spaudziam($jungti);
echo "<br><br> Cia spausdinam dvimacio masyvo elementu suma <br>";
$suma = $masyvai->sumaDvimate($dvimatis);
echo $suma; 
echo "<br><br> Cia spausdinam masyvo lentele <br>";
$masyvai->spausdinam($daugiaumatis);
echo "<br><br> Cia tikrinam ar jis atsikartoja <br>";
$ar = $masyvai->arSimetrija($daugiaumatis);
var_dump($ar);
echo "<br><br> Cia spausdinam 9 <br>";
$dev = $masyvai->tiesa($dvimatis);
$masyvai->spausdinam($dev);

?>
