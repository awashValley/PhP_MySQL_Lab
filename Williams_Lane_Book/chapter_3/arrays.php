<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chapter 3 (Example 3-1): Multidimensional Arrays in PHP</title>
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
	?>



</body>
</html>