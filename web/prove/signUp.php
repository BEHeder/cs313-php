<?php
    session_start();
	require("../shared/dbConnect.php");
    $db = get_db();
    if (isset($_SESSION['username']))
    {
        header("Location: ./games.php");
        die();
    }
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Sign Up</h1>
        <?php
            if (isset($_SESSION["invalidSignUp"]) && $_SESSION["invalidSignUp"])
            {
                echo "Please fill in all fields!</br>";
                unset($_SESSION["invalidSignUp"]);
            }
        ?>
        <form action="./userAdd.php" method="POST">
            Username:</br>
            <input type="text" name="usernameUp" placeholder="Username"></br>
            Display Name:</br>
            <input type="text" name="displayUp" placeholder="Display Name"></br>
            Password:</br>
            <input type="password" name="passwordUp" placeholder="Password"></br>
            <input type="submit" value="Sign Up"></br>
        </form>
    </body>
</html>