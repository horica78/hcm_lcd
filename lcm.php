<?php
error_reporting(E_ERROR | E_PARSE);
function pprime($n){
  if($n >= 2){
    for($i=2;$i<=($n/2);$i++){
      $k=0;
      $bFound = false;
      while(($n/pow($i,($k+1)))>=1 && (($n%pow($i,($k+1))) == 0)){
		$bFound = true;
		$k++;
      }
      if($bFound && nprim($i)){
        if(is_null($arr_pow)){
			$arr_pow[0] = array($i,$k);
        }
        else{
			array_push($arr_pow,array($i,$k));
        }
      }
    }
    if(nprim($n)){
      if(is_null($arr_pow)){
		$arr_pow[0] = array($n,1);
      }
      else{
		array_push($arr_pow,array($n,1));
      }
    }
  }
  return $arr_pow;
}
function nprim($n){
  $bFound = false;
  if($n >= 4){
    for($i=2;$i<=($n/2);$i++){
      while(($n/$i)>=1 && fmod($n,$i) == 0){
		$bFound = true;
		break;
      }
    }
  }
  return !$bFound;
}
function cmmmc(){
	$arr_nr = func_get_args();
  for($i=0;$i<count($arr_nr);$i++){
    $arr_nr_desc[$i] = pprime($arr_nr[$i]);
  }
  //echo "<pre>".print_r($arr_nr_desc,1)."</pre>";
  for($i=0;$i<count($arr_nr_desc);$i++){
    for($j=0;$j<count($arr_nr_desc[$i]);$j++){
      if(is_null($arr_prime)){
		$arr_prime[0] = $arr_nr_desc[$i][$j][0];
      }
      else{
		if(!in_array($arr_nr_desc[$i][$j][0],$arr_prime)){
			array_push($arr_prime,$arr_nr_desc[$i][$j][0]);
		}
      }
    }
  }
  //echo "<pre>".print_r($arr_prime,1)."</pre>";
  for($k=0;$k<count($arr_prime);$k++){
    $arr_prime_new[$k][0] = $arr_prime[$k];
    $arr_prime_new[$k][1] = 1;
    for($i=0;$i<count($arr_nr_desc);$i++){
      for($j=0;$j<count($arr_nr_desc[$i]);$j++){
		if($arr_prime_new[$k][0] == $arr_nr_desc[$i][$j][0]){
			$arr_prime_new[$k][1] = max($arr_prime_new[$k][1],$arr_nr_desc[$i][$j][1]);
		}
      }
    }
  }
  $nr = 1;
  for($k=0;$k<count($arr_prime_new);$k++){
    $nr *= pow($arr_prime_new[$k][0],$arr_prime_new[$k][1]);
  }
  return $nr;
}
//echo "<pre>".print_r(pprime(3),1)."</pre>";
//echo "<pre>".print_r(pprime(3),1)."</pre>";
/*echo "<br>".cmmmc(array(21,4,28));
echo "<br>".cmmmc(array(2,8,11));
echo "<br>".cmmmc(array(5,6,9));
echo "<br>".cmmmc(array(7,8,4));
echo "<br>".cmmmc(array(5,8,11));
echo "<br>".cmmmc(array(5,8,12));
echo "<br>".cmmmc(array(9,8,14));
echo "<br>".cmmmc(array(5,8,12));
echo "<br>".cmmmc(array(6,9,21));
echo "<br>".cmmmc(array(7,9,13));
echo "<br>".cmmmc(array(8,9,4));
echo "<br>".cmmmc(array(8,9,11));
echo "<br>".cmmmc(array(15,8,21));
*/
//echo "<br>".cmmmc(array(10,11,12));
//echo "<br>".cmmmc(array(18,20,25));
//echo "<br>".cmmmc(array(8,9,11,12,14,15,16,17,21,40));
//echo "<br>".cmmmc(array(8,4,2,9));
//echo "<br>".cmmmc(array(214,56,71,82));
//echo "<br>".cmmmc(array(428,51,73));
//echo "<br>".cmmmc(array(2,2,4));
/*$j = 0;
for($i=1;$i<=1000;$i++){
	if(nprim($i)){
		echo "<br>".$i;
		$j++;
	}	
}	
echo "<br>Sunt :".$j;
*/
echo "<br>".cmmmc(8,4,2,2);
//var_dump(nprim(997));0
?>