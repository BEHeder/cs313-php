<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>B. Heder's Home Page</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./mystyle.css">
</head>
<body>
  <?php
    echo "<a href='./intro.html'>Introduction Page</a><br>";
    echo "<a href='./assignments.html'>Assignments Page</a><br>";
    date_default_timezone_set("America/Boise");
    echo date("h:i:s a, l, m/d/Y");
  ?>
</body>