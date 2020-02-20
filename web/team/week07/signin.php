<?php
    require("../../shared/dbConnect.php");
    $db = get_db();
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Sign In</h1>
        <form action="" method="POST">
            Username:</br>
            <input type="text" name="username" placeholder="Username"></br>
            Password:</br>
            <input type="password" name="password"></br>
            <input type="submit" value="Sign In"></br>
        </form>
    </body>
</html>