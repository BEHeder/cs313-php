<?php
    session_start();
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
            <input type="text" name="usernameUp" placeholder="Username"></br>
            Password:</br>
            <input type="password" name="passwordUp"></br>
            <input type="submit" value="Sign Up"></br>
        </form>
    </body>
</html>