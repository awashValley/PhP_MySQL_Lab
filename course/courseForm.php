<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Course Form</title>
  </head>
  <body>
    <form action="showCourse.php" method="post">
        <input type="submit" name="display" value="Show courses"><br />
    </form>

    <h3>Insert Lectures</h3>
    <form action="courseForm.php" method="post">
        <div class="field">
            <label for="topic">Topic</label>
            <input type="text" name="topic"><br />
        </div>
        <div class="field">
            <label for="name">Name</label>
            <input type="text" name="name"><br />
        </div>
        <div class="field">
            <label for="attendance">Attendance</label>
            <input type="text" name="attendance"><br />
        </div>
        <input type="submit" name="add" value="Add">
    </form>

    <?php
        error_reporting(0);
        require 'db/connect.php';

        // Get values from form
        $topic      = trim($_POST['topic']);
        $name       = trim($_POST['name']);
        $attendance = trim($_POST['attendance']);
        $add        = trim($_POST['add']);

        if(isset($add)){
            if (!empty($topic) && !empty($name) && !empty($attendance)) {
              $qr_insrt = "INSERT INTO lectures (Topic, Name, Attendance, Created)
                              VALUES('$topic', '$name', '$attendance', CURRENT_TIMESTAMP)";

              mysql_query($qr_insrt, $con) or die($qr_insrt."<br/><br/>".mysql_error());
            }
            else {
              echo "Please, you need to give me first the course details...";
            }

        }

        mysql_close($con);
    ?>

  </body>
</html>
