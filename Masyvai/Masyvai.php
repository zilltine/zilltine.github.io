<?php
class Masyvai{
	public function spaudziam($array){
		?> <table style="border: 1px solid grey;"> <tr style="border: 1px solid grey;"> <?php
		foreach ($array as $val){
			?> <td style="border: 1px solid grey;"> <?php 
			echo $val. "  ";
			?> </td> <?php
		}
		?> </tr>
		</table> <?php
	}
	public function init($nr){
		for ($i=0; $i<$nr; $i++){
			$array[$i]= rand(1,5);
		}
		return $array;
	} 
	public function merginam($array1, $array2){
		$countas2 = $this->countas($array2);
		$countas1 = $this->countas($array1);
		for ($i=0; $i<$countas2; $i++){
			$array1[$i+$countas1]= $array2[$i];
		}
		return $array1;
	}
	public function suma($array){
		$sum=0;
		foreach ($array as $value){
			$sum=$sum+$value;
		}
		return $sum;
	}
	public function pushinam($array1, $kint){
		$countas1 = $this->countas($array1);
		$array1[$i+$countas1]= $kint;
		return $array1;
	}
	public function countas($array){
		$count=0;
		foreach ($array as $value){
			$count++;
		}
		return $count;
	}
	public function vidurkis($array){
		$sum=$this->suma($array);
		$avg=$sum/$this->countas($array);
		return $avg;		
	}

	public function mazas($array){
		$min=$array[0];
		foreach ($array as $value){
			if ($min>$value){
				$min=$value;
			}
		}
		return $min;
	}
	public function didelis($array){
		$max=$array[0];
		foreach ($array as $value){
			if ($max<$value){
				$max=$value;
			}
		}
		return $max;
	}
	public function skirtumas($array){
		$min=$this->mazas($array);
		$max=$this->didelis($array);
		return $max-$min;
	}
	public function vienasPenki($array){
		$newArray = array(0,0,0,0,0);
		foreach ($array as $key => $value){
			$newArray[$value-1]++;
		}
		return $newArray;
	}
	public function lyginam($array1, $array2){
		$vienas = ($this->countas($array1));
		$du = ($this->countas($array2));
		if ($vienas == $du) {
			echo "true";
			return true;
		}
		else {
			echo "false";
			return false;
		}
	}
	public function sandaugos($array1, $array2){
		$array = array();
			foreach ($array1 as $key => $value){
				$array[$key]=$array2[$key]*$value;
			}
		return $array;	
	}
	public function sortinam($array1){
		$array = array();
		$i=0;
		$min = $this->mazas($array1);
		while ($i<$this->countas($array1)){
			foreach ($array1 as $key => $value){
				if ($value == $min){
					$array[$i]=$value;
					$i++;
				}
			}
			$min++;
		}
		return $array;
	}
	public function jungiam($array1, $array2){
		$array=$this->merginam($array1, $array2);
		return $this->sortinam($array);
	}
	public function sumaDvimate($array1){
		return $this->suma($array1[0])+$this->suma($array1[1]);
	}
	public function spausdinam($array){
		?> <table style="border: 1px solid grey;"> <?php
		foreach ($array as $key => $value){
			?><tr style="border: 1px solid grey;"><?php
			foreach ($value as $value2){
			?><td style="border: 1px solid grey;"><?php echo $value2; ?> </td><?php
			}
			?></tr><?php
			
		}
		?> </table <?php
	}
	
	public function tiesa($array){
		foreach ($array as $key => $value){
			foreach ($value as $key2 => $value2){
				if ($value2 >= 0){
					$array[$key][$key2]= "true";
				}
				else {
					$array[$key][$key2]= "false";
				}
			}
		}
		return $array;
	}
	public function arSimetrija($array){
		$countas=$this->countas($array);
		for ($i=0; $i<$countas; $i++){
			for ($j=0; $j<$countas; $j++){
				if ($array[$i][$j]!=$array[$j][$i]){
					return false;
					var_dump($array[$i][$j]);
				}
			}
		}
		return true;
	}
}
?>