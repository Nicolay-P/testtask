<?php
$Limit=2000000;
$str = str_repeat("1", $Limit);
$str[0]=0;
$str[1]=0; //0,1 -не простые числа
//Используем  алгоритм Эратосфена
for($i=2;$i<=sqrt($Limit);$i++){

if($str[$i]==="1"){
	for($j=$i*$i; $j<=$Limit; $j+=$i){
		$str[$j]="0";
		}
	}
}
//echo $str;
$res=0;
for($i=0;$i<=$Limit;$i++){
	if($str[$i]==="1"){
		$res+=$i;
	}
}
echo 'Ответ='.$res;
?>