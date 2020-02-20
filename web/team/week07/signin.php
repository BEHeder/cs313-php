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
        <h1>Sign In</h1>
        <p>Need an account? <a href="./signup.php">Sign Up</a></p>
        <form action="" method="POST">
            Username:</br>
            <input type="text" name="usernameIn" placeholder="Username"></br>
            Password:</br>
            <input type="password" name="passwordIn"></br>
            <input type="submit" value="Sign In"></br>
        </form>
    </body>
</html>