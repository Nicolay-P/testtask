<?php
/**
*  Circle
*/

class CircleClass
{
	private $radius;

	public $message;
	
	function __construct($argArray)
	{
		$this->radius = $argArray["radius"];
		$this->message = 'Circle, r='.$this->radius;
	}
	public function GetArea(){
		return M_PI*pow($this->radius, 2);
	}

}
?>