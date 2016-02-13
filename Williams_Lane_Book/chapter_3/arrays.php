<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chapter 3: Arrays, Strings, and Advanced Data Manipulation in PHP</title>
</head>
<body bgcolor="#ffffff">
	<h3>A two dimensional array</h3>
	<?php
		// A two dimensional array using integer indexes
		$planets = array(array("Mercury", 0.39, 0.38),
						array("Venus",   0.72, 0.95),
						array("Earth",   1.00, 1.00),
						array("Mars",    1.52, 0.53) );

		// prints "Earth"
		print $planets[2][0];
	?>
	<h3>More sophisticated multi-dimensional array</h3>
	<?php
		// More sophisticated multi-dimensional array
		$planets2 = array(
			"Mercury" => array("dist"=>0.39, "dia"=>0.38),
			"Venus"   => array("dist"=>0.72, "dia"=>0.95),
			"Earth"   => array("dist"=>0.10, "dia"=>0.10,
							   "moons"=>array("Moon")),
			"Mars"    => array("dist"=>1.52, "dia"=>0.53,
							   "moons"=>array("Phobos", "Deimos"))
			);

		// prints "Moon"
		print $planets2["Earth"]["moons"][0];
		print "<br>The {$planets2["Earth"]["moons"][0]} is a balloon.";
	?>

	<h3>Using foreach Loops with Arrays</h3>
	<?php
		// Old MacDonald
		$sounds = array("cow"=>"moo", "dog"=>"woof",
						"pig"=>"oink", "duck"=>"quack");

		foreach ($sounds as $animal => $sound) {
			print "<p>Old MacDonald had a farm EIEIO";
			print "<br>And on that farm he had a {$animal} EIEIO";
			print "<br>With a {$sound}-{$sound} here";
			print "<br>And a {$sound}-{$sound} there";
			print "<br>Here a {$sound}, there a {$sound}";
			print "<br>Everywhere a {$sound}";
			print "<p>Old MacDonald had a farm EIEIO";
		}
	?>

	<h3>Heterogeneous arrays</h3>
	<?php
		$mixedBag = array("cat", 42, 8.5, false);

		var_dump($mixedBag);
		print "<br>";
		print_r($mixedBag);
	?>

	<h3>Exploding and Imploding Strings</h3>
	<?php
		$words = explode(" ", "Now is the time");
		print_r($words);

		$animalsSeen = array("Kangaroo", "wombat", "dingo", "echidna");
		print "<br>Animals I've seen: " . implode(", ", $animalsSeen);


	?>





</body>
</html>