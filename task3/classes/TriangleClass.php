<?php
/**
*  Triangle
*/
class TriangleClass
{
	private $side_a;
	private $side_b;
	private $side_c;

	public $message;
	
	function __construct($argArray)
	{
		$this->side_a=$argArray["a"];
		$this->side_b=$argArray["b"];
		$this->side_c=$argArray["c"];
		$this->message='Triangle: a='.$this->side_a.',b='.$this->side_b.',c='.$this->side_c;
		
	}
	public function GetArea(){
		//Вычисляем площадь треугольника по т. Герона S=(P*(P-a)*(P-b)*(P-c))^0.5, где P=периметр/2
		$Semiperimeter=($this->side_a+$this->side_b+$this->side_c)/2;
		$FirstAction=$Semiperimeter*($Semiperimeter-$this->side_a)*($Semiperimeter-$this->side_b)*($Semiperimeter-$this->side_c);
		return sqrt($FirstAction);
	}
}
?>