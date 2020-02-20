<?php
    require("../../shared/dbConnect.php");
    $db = get_db();
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Sign Up</h1>
        <form action="./insert.php" method="POST">
            Username:</br>
            <input type="text" name="username" placeholder="Username"></br>
            Password:</br>
            <input type="password" name="password"></br>
            <input type="submit" value="Sign Up"></br>
        </form>
    </body>
</html>