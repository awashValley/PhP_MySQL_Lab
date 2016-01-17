<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insert lectures</title>
  </head>
  <body>

    <h3>Insert Lectures</h3>
    <form action="insertForm.php" method="post">
        Topic:<input type="text" name="topic"><br />
        Name:<input type="text" name="name"><br />
        Attendance:<input type="text" name="attendance"><br />
        <input type="submit" name="submit" value="Submit">
    </form>


    <?php
        if(isset($_POST['submit'])){
            error_reporting(0);
            $con = mysql_connect("localhost", "root", "Bob1@Saron2");

            if(!($con)){
              die("Can not connect: " . mysql_error());
            }

            mysql_select_db("Course", $con);

            $topic      = $_POST[topic];
            $name       = $_POST[name];
            $attendance = $_POST[attendance];

            $query = "INSERT INTO lectures (Topic, Name, Attendance)
                        VALUES('$topic', '$name', '$attendance')";

            mysql_query($query, $con);

            mysql_close($con);
        }

    ?>
  </body>
</html>
