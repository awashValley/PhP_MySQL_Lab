<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
	   Chapter 4: Introduction to OOP with PHP 5.
	</title>
</head>
<body>

  <h3>Chapter 4: Introduction to OOP with PHP 5.</h3>

  <?php 

    /* Example 4.2: Using the UnitCounter class */

  	// require "example4_1_class.php";

  	// // Create a new UnitCounter object
  	// $bottles = new UnitCounter;

  	// // set the counter to 2 dozen bottles
  	// $bottles->units = 24;

  	// // Add a single bottle
  	// $bottles->add();

  	// // Add three more
  	// $bottles->add(3);

  	// // Show the total units and weight
  	// print "There are {$bottles->units} units, ";
  	// print "total weight = " . $bottles->totalweight() . " kg";


  	// // Change the default weight per unit and show the new total weight
  	// $bottles->weightPerUnit = 1.2;
  	// print "<br>Correct total weight = " . $bottles->totalweight() . " kg";


  	/* Example 4.6: Static member variables */
  	require "example4_6_classDonation.php";

  	$donors = array(
  		new Donation("Nicholas", 85.00),
  		new Donation("Matt", 50.00),
  		new Donation("Emily", 90.00),
  		new Donation("Sally", 65.00));

  	foreach ($donors as $donor) {
  		print $donor->info() . "<br>";
  	}

  	$total = Donation::$totalDonated;
  	$count = Donation::$numberOfDonors;
  	print "<br>Total Donations = {$total}";
  	print "<br>Number of Donors = {$count}";


  ?>
	
</body>
</html>