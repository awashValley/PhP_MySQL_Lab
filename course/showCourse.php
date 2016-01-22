<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Show Courses</title>
  </head>
  <body>
    <br />
    <button onclick="history.go(-1);">Back </button><br />
    <br />
    <?php
        error_reporting(0);
        require 'db/connect.php';

        $qr_disp = "SELECT *
                      FROM lectures
                      ORDER BY topic";

        $result = mysql_query($qr_disp, $con) or die($qr_disp."<br/><br/>".mysql_error());

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

        mysql_close($con);
    ?>

  </body>
</html>
