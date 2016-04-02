<?php 

/**
* Definition of the class UnitCounter
*/
class UnitCounter
{

	// member variables
	var $units = 1;
	var $weightPerUnit = 1.0;


	// add $n to the total number of units, default $n to 1
	function add($n = 1){
		$this->units += $n;
	}

	// Member function that calculates the total weight
	function totalweight(){
		return $this->units * $this->weightPerUnit;
	}
	
	// function __construct(argument)
	// {
	// 	# code...
	// }
}

?>