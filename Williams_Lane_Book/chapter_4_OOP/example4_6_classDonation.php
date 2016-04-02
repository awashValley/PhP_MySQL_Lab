<?php  
	/**
	* Example 4-6: Static member variables (page 119)
	*/
	class Donation
	{

		private $name;
		private $amount;

		static $totalDonated = 0;
		static $numberOfDonors = 0;

		function info(){
			$share = round(100 * $this->amount / Donation::$totalDonated, 2);
			return "{$this->name} donated {$this->amount} ({$share}%)";
		}

		function __construct($nameOfDonor, $donation){
			$this->name = $nameOfDonor;
			$this->amount = $donation;

			Donation::$totalDonated += $donation;
			Donation::$numberOfDonors++;
		}

		function __destruct(){
			Donation::$totalDonated -= $donation;
			Donation::$numberOfDonors--;
		}
	}


?>