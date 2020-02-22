<?php
    session_start();
	require("../shared/dbConnect.php");
    $db = get_db();
    if (isset($_SESSION['username']))
    {
        header("Location: ./games.php");
        die();
    }
    else if (!isset($_POST['usernameUp']) || $_POST['usernameUp'] == "" || 
             !isset($_POST['displayUp'])  || $_POST['displayUp']  == "" || 
             !isset($_POST['passwordUp']) || $_POST['passwordUp'] == "")
    {
        $_SESSION["invalidSignUp"] = true;
        header("Location: ./signUp.php");
        die();
    }
    $username = htmlspecialchars($_POST['usernameUp']);
    $displayName = htmlspecialchars($_POST['displayUp']);
    $passwordHash = password_hash($_POST['passwordUp'], PASSWORD_DEFAULT);
    $query = 'INSERT INTO game_user (username, password, display_name, is_public) 
                VALUES (:username, :passwordHash, :displayName, false)';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':passwordHash', $passwordHash);
    $statement->bindValue(':displayName', $displayName);
    $statement->execute();
    echo "Sign-Up Successful! Redirecting in 3 seconds...</br>";
    header("refresh: 3; url = ./signIn.php");
    die();
?>
