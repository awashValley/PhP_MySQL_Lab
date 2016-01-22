<?php
    $con = mysql_connect("localhost", "root", "mypassword");

    if(!($con)){
      die("Can not connect: " . mysql_error());
    }

    mysql_select_db("Course", $con);
?>
