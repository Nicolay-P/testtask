<?php
include dirname(__FILE__)."/classes/CircleClass.php";
include dirname(__FILE__)."/classes/RectangleClass.php";
include dirname(__FILE__)."/classes/TriangleClass.php";

$jsonString =file_get_contents(dirname(__FILE__)."/figures.json");
$decodeString = json_decode( $jsonString, true );         //декодируем строку json в массив


$resultArray=array();
foreach($decodeString  as $var){            //В зависимости от типа фигуры создаем объекты классов CircleClass,RectangleClass, или TriangleClass; 
	if($var['type']=='circle'){
		$result=new CircleClass($var); 
	}
	elseif($var['type']=='rectangle'){
		$result=new RectangleClass($var);		
	}
	elseif($var['type']=='triangle'){       
		$result=new TriangleClass($var);		
	}
	$resultArray[$result->message] = $result->GetArea();  //записываем в массив где ключ ($result->message)-подготовленная строка типа 'Circle, r=7', 'Triangle: a=4,b=5,c=6', а значение это полученная площадь
}

echo '<pre>';
arsort($resultArray);       //Сортируем по убыванию и выводим
while (list($key, $val) = each($resultArray)) {
    echo "$key = $val\n";
}
echo 'ok';
?>