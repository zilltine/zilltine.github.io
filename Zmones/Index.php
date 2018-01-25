<form method="post">
	<input type="text" name="vardas" placeholder="Vardas" required /><br><br>
	<input type="text" name="pavarde" placeholder="Pavarde" required /><br><br>
	<input type="number" name="metai" placeholder="Gimimo metai" required /><br><br>
	<input type="number" name="ugis" placeholder="Ugis" required/><br><br>
	<input type="number" name="svoris" placeholder="Svoris" required/><br><br>
	<input type="radio" name="lytis" required value="Moteris" > Moteris<br>
	<input type="radio" name="lytis" value="Vyras"> Vyras<br>
	<input type="submit" name="pateikti" value="Pateikti" />
	<style="clear:both"></div>
</form>


<?php
class Asmuo {
	public $amzius;
	public $vardas;
	public $pavarde;
	public $gimimoMetai;
	public $ugis;
	public $svoris;
	
	public function __construct($vardas, $pavarde, $gime, $ugis, $svoris) {
		$this->vardas=$vardas;
		$this->pavarde=$pavarde;
		$this->gimimoMetai=$gime;
		$this->ugis=$ugis;
		$this->svoris=$svoris;
		$this->amzius($gime);
	}
	public function amzius($gime){
		$this->amzius=intval(date("Y"))-$gime;
		return $this->amzius;
	}
	public function kmi(){
		return $this->svoris*$this->svoris-$this->ugis*$this->ugis;
	}
	
}
class Moteris extends Asmuo {
	public function kmi() {
		return $this->svoris^2-$this->ugis^2*1.1;
	}
	public function pensija(){
		var_dump($this->amzius);
		if ($this-amzius>61){
			return "Pensija";
		}
		else {
			return "Dirbam";
		}
	}
}
class Vyras extends Asmuo {
	public function pensija(){
		var_dump($this->amzius);
		if ($this->amzius>63){
			return "Pensija";
		}
		else {
			return "Dirbam";
		}
	}
}

$obj = new Asmuo($_POST['vardas'], $_POST['pavarde'],$_POST['metai'],$_POST['ugis'], $_POST['svoris']);
$vyras = new Vyras($_POST['vardas'], $_POST['pavarde'],$_POST['metai'],$_POST['ugis'], $_POST['svoris']);;
//echo $vyras->pensija();
$array = array(
	'vardas' => 'Zilvinas',
	'ugis' => 173);
// $obj2 = json_encode($array);
// var_dump(json_decode($obj2));
