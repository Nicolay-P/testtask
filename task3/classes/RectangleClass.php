<?php
/**
*  Rectangle
*/
class RectangleClass
{
	private $side_a;
	private $side_b;

	public $message;
	
	function __construct($argArray)
	{
		$this->side_a=$argArray["a"];
		$this->side_b=$argArray["b"];
		$this->message='Rectangle: a='.$this->side_a.',b='.$this->side_b;
	}
	public function GetArea(){
		return $this->side_a*$this->side_b;
	}
}
?>