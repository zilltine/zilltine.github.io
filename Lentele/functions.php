<?php
class Duomenys{
	public $laikas= 25;
	public function connect(){
		$connect=mysqli_connect("localhost", "mpdelt_02", "IsmokKodint333", "mpdelt_02");
		if (!$connect){
			echo "ERROR";
		}
		return $connect;
	}
	
	public function upload($uzduotis){
		$sql = "INSERT INTO uzduotys (aprasymas) VALUES ('$uzduotis')";
		if (mysqli_query($this->connect(), $sql)){
		}
	}
	
	public function isvestiLentele($id, $order, $sort){
		
		// $result2 = mysqli_query($this->connect(), "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'sprendimai'");
		// $row2= mysqli_fetch_array($result2);
		// var_dump($row2);
		if ($sort == 'DESC'){
			echo "true";
			$sort='ASC';
		}
		else {
			echo "false";
			$sort='DESC';
		}
		?><table class="table table-hover">
		<thead>
			<tr>
				<th><a href="?uzduoties_id=<?php echo $id;?>&sort=<?php echo $sort; ?>&order=id">ID</a></th>
				<th><a href="?uzduoties_id=<?php echo $id;?>&sort=<?php echo $sort; ?>&order=uzduoties_id">Uzduotis</th>
				<th><a href="?uzduoties_id=<?php echo $id;?>&sort=<?php echo $sort; ?>&order=duomenys1">Duomenys1</th>
				<th><a href="?uzduoties_id=<?php echo $id;?>&sort=<?php echo $sort; ?>&order=duomenys2">Duomenys2</th>
				<th><a href="?uzduoties_id=<?php echo $id;?>&sort=<?php echo $sort; ?>&order=rezultatas">Rezultatas</th>
			</tr>
		</thead>
		<?php
	

		$sql = "SELECT * FROM sprendimai WHERE uzduoties_id = $id ORDER BY $order $sort LIMIT 10";
		$result = mysqli_query($this->connect(), $sql);
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			?> <tr><?php
			foreach ($row as $key => $value){
				//if ($key != 'duomenys1' && $key != 'duomenys2'){
					?><td><?php echo $value; ?></td><?php
				/*}
				else {
					$naujas =json_decode($value);
					if (is_object($naujas)){
						foreach ($naujas as $key2 => $value2){
							?><td><?php echo $value2; ?></td><?php
						}
					}
				}*/
			}
			
			?> </tr><?php
		}
		
		?></table<?php
			
	}
}

class Asmuo {
	
	public $amzius;
	public $vardas;
	public $pavarde;
	public $gimimoMetai;
	public $ugis;
	public $svoris;
	
	public function sprendimas($id, $duomenys, $rez){
		$sql = "INSERT INTO sprendimai (uzduoties_id, duomenys1, rezultatas) VALUES ($id, '$duomenys', '$rez')";
		if (mysqli_query($this->connect(), $sql)){
		}
	}
	
	public function connect(){
		$connect=mysqli_connect("localhost", "mpdelt_02", "IsmokKodint333", "mpdelt_02");
		if (!$connect){
			echo "ERROR";
		}
		return $connect;
	}
	public function __construct($vardas, $pavarde, $gime, $ugis, $svoris) {
		$this->vardas=$vardas;
		$this->pavarde=$pavarde;
		$this->gimimoMetai=$gime;
		$this->ugis=$ugis/100;
		$this->svoris=$svoris;
		$this->amzius=$this->amzius();
	}
	public function amzius(){
		$this->amzius=intval(date("Y"))-$this->gimimoMetai;
		$this->sprendimas(5, json_encode($this), $this->amzius);
		return $this->amzius;
	}
	
}
class Moteris extends Asmuo {
	public function kmi() {
		$rez = $this->svoris/$this->ugis^2*1.1;
		$this->sprendimas(4, json_encode($this), $rez);
		return $rez;
	}
	public function pensija(){
		if ($this->amzius>61){
			$rez = "Pensija";
		}
		else {
			$rez = "Dirbam";
		}
		$this->sprendimas(6, json_encode($this), $rez);
		return $rez;
	}
}
class Vyras extends Asmuo {
	public function pensija(){
		if ($this->amzius>63){
			$rez = "Pensija";
		}
		else {
			$rez = "Dirbam";
		}
		$this->sprendimas(7, json_encode($this), $rez);
		return $rez;
	}
	public function kmi(){
		$rez = $this->svoris*$this->svoris-$this->ugis*$this->ugis;
		$this->sprendimas(8, json_encode($this), $rez);
		return $rez;
	}
	
}



?>