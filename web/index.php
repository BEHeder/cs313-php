<!DOCTYPE html>
<head>
  <title>B. Heder's Home Page</title>
  <link rel="stylesheet" type="text/css" href="./mystyle.css">
</head>
<body>
  <?php
    echo "<a href='./intro.html'>Introduction Page</a></br>";
    echo "<a href='./assignments.html'>Assignments Page</a>";
    date_default_timezone_set("America/Boise");
    echo date("h:i:s a, l, m/d/Y");
  ?>
</body>