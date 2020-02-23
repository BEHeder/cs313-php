<?php
    session_start();
	require("../shared/dbConnect.php");
    $db = get_db();
    $invalidLogin = false;
    if (isset($_SESSION['username']))
    {
        header("Location: ./games.php");
        die();
    }
    else if (isset($_POST['usernameIn']) && isset($_POST['passwordIn']))
    {
        $username = $_POST['usernameIn'];
        $password = $_POST['passwordIn'];
        $query = "SELECT * FROM game_user WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $result = $statement->execute();
        if ($result)
        {
            $row = $statement->fetch();
            $passwordRight = $row['password'];
            if (password_verify($password, $passwordRight))
            {
                $_SESSION["username"] = $username;
                header("Location: ./games.php");
                die();
            }
            else
            {
                $invalidLogin = true;
            }
        }
        else
        {
            $invalidLogin = true;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Sign In</h1>
        <?php
            if ($invalidLogin)
            {
                echo "Invalid username or password!</br>";
            }
        ?>
        <p>Need an account? <a href="./signUp.php">Sign Up</a></p>
        <form action="signIn.php" method="POST">
            Username:</br>
            <input type="text" name="usernameIn" placeholder="Username"></br>
            Password:</br>
            <input type="password" name="passwordIn" placeholder="Password"></br>
            <input type="submit" name="signIn" value="Sign In"></br>
        </form>
    </body>
</html>