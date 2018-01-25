<?php

class Rulete
{
	public $circle = array(0,32,15,19,4,21,2,25,17,34,6,27,13,36,11,30,8,23,10,5,24,16,33,1,20,14,31,9,22,18,29,7,28,12,35,3,26);
	public $color = "";
	public $betcolor = "";
	public $pinigai;
	public $rieda;
	public $bet;
	public $multiply;
	public $amountColor;
	public $amountNumber;
	
	public function __construct ($pinigai){
 	$this->pinigai = $pinigai;
	}
	private function ridenti(){
 		$this->rieda = rand(0,36);
		
		if ($this->rieda%2 == 0 && $this->rieda != 0){
			$this->color = "BLACK";
  		}
		if ($this->rieda%2 != 0) {
			$this->color = "RED";
  		}
		if ($this->rieda == 0) {
			$this->color = "GREEN";
 		} 	
		echo "<br> AND THE ROLL IS -- ".$this->circle[$this->rieda]. " ".$this->color."<br><br>";	
	}
	
	private function skaiciuoti($color, $rieda, $betcolor, $bet){
		$add = 0;
		$this->ridenti();
		if ($this->color == $this->betcolor) {
			$add = $add+$this->amountColor*2;
		}
		if ($this->rieda == $this->bet) {
			$add = $add+$this->amountNumber*36;
		}
		echo "<br> CONGRATULATIONS! You Have Won!!  ".$add ."<br><br>";
		return $add;
		
	}
	
	public function statyti($amountColor, $amountNumber){	
		$this->amountColor = $amountColor;
		$this->amountNumber = $amountNumber;
		$totalAmount  = $amountColor + $amountNumber;
		$this->pinigai = $this->pinigai-$totalAmount;
 		$this->bet = rand(1,36);
		echo "Bet Accepted On Number ".$this->circle[$this->bet] ." For " .$this->amountNumber ."EUR<br><br>";	
		if ($this->bet%2 == 0){
			$this->betcolor = "BLACK";
				
  		}
		if ($this->bet%2 != 0) {
			$this->betcolor = "RED";
  		}
		echo "Bet accepted on color ".$this->betcolor ." For " .$this->amountColor ."EUR<br><br>";
        $this->pinigai=$this->pinigai+$this->skaiciuoti($this->color, $this->rieda, $this->betcolor, $this->bet);
			
	}

}
	
$rulete = new Rulete(1000);
for ($i=0 ; $i<70; $i++){
	$likutis = $rulete->statyti(100, 20);
	echo "Jums liko Pinigu:   ". $rulete->pinigai. "<br><br>";
}
?>