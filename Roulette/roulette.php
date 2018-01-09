<?php
class Rulete
{
public $pinigai;
public function __construct ($pinigai){
  $this->pinigai = $pinigai;
}
private function ridenti($statymas){
 $rieda = rand(1,2);
  //echo $rieda. "  rieda \r\n";
  //echo $statymas. "  statymas \r\n";
 if ($rieda == 1){
  echo "Isridenta raudona spalva \r\n";
   if ($statymas == 1){
   echo "Sveikiname, laimejote  \r\n";
   return 2;
  }
  else {
   echo "Deja, nelaimejote \r\n";
   return 0;
  }
 } 
 else {
  echo "Isridenta juoda spalva \r\n";
  if ($statymas == 2){
   echo "Sveikiname, laimejote \r\n";
   return 2;
  }
  else {
   echo "Deja, nelaimejote \r\n";
   return 0;
  }
 }
}

public function naujinti($amount){
  
 $this->pinigai = $this->pinigai-$amount;
 $statymas = rand(1,2);
  //echo "Likutis dabar yra:   ". $this->pinigai. "\r\n"; 
 if ($statymas == 1) {
  echo "Statymai priimti, jus pastatete: ". $amount ." ant raudonos spalvos". "\r\n";

 } 
 else {
  echo "Statymai priimti, jus pastatete: ". $amount ." ant juodos spalvos". "\r\n";
 }
  $daug = $this->ridenti($statymas);
  echo "daug yra:   ". $daug ."\r\n";
 $likutis = $this->pinigai+$daug*$amount;
 $this->pinigai=$likutis;
 return $likutis;
 
// $this -> $pinigai = $likutis; 
}
}
$rulete = new Rulete(10);
for ($i=0 ; $i<3; $i++){

$likutis = $rulete->naujinti(10);
echo "Jums liko Pinigu:   ". $likutis. "\r\n";
//echo $rulete -> $pinigai;
}
?>