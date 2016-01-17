<!DOCTYPE html>
<html lang="en">
<head>
	<!-- <meta charset="UTF-8"> -->
	<meta http-equiv="Content-Type" content="text/html"; 
		  charset="iso-8859-1">
	<title>Wines</title>
</head>
<body>
<!-- Chapter-5: QUERING WEB DATABASES			
 		Hugh E. Williams and David Lane	(2nd Edition) -->	

<!-- Example (pp. 172): Connecting to MySQL database with PHP -->
	<pre>
	<?php
		// (1). Open the database connection
		$connection = mysql_connect("localhost", "root", "Ur DB password");
		
		if(!($connection)){
          		die("Can not connect: " . mysql_error());
        	}

		// (2). Select the winestore database
		mysql_select_db("winestore");

		// (3). Run the query on the winestore through the connection
		$query = "SELECT *
			     FROM wine limit 5"; 
		$result = mysql_query($query, $connection) or die($query."<br/><br/>".mysql_error());		

		// (4). While there are still rows in the result set, 
		//		fetch the current row into the array $row
		// while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
		// 	// (5). Print out each element in $row, i.e., print the values
		// 	//		of the attributes
		// 	foreach ($row as $attribute) {
		// 		echo "{$attribute} ";
		// 	}

		// 	// Print a carriage return to neaten the output
		// 	print "\n";
		// }
		
		$fields_num = mysql_num_fields($result);

	      	echo "<table border='1'><tr>";
	      	// printing table headers
	      	for($i=0; $i<$fields_num; $i++)
	      	{
	          	$field = mysql_fetch_field($result);
	          	echo "<td>{$field->name}</td>";
	      	}
	      	echo "</tr>\n";
	      	// printing table rows
	      	while($row = mysql_fetch_row($result))
	      	{
	          	echo "<tr>";
	
	          	// $row is array... foreach( .. ) puts every element
	          	// of $row to $cell variable
	           	foreach($row as $cell)
	              		echo "<td>$cell</td>";
	
	          	echo "</tr>\n";
	      	}
	      
	      	mysql_free_result($result);

	?>


	</pre>
	
</body>
</html>
