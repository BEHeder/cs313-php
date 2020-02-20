<?php
    require("../../shared/dbConnect.php");
    $db = get_db();

    $username = $_POST['username'];
    $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try
    {
        $query = 'INSERT INTO w7_user (username, password) VALUES (:username, :passwordHash)';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':passwordHash', $passwordHash);
        $statement->execute();
    }
    catch (Exception $ex)
    {
        echo "Error with DB. Details: $ex";
        die();
    }

    header("Location: signin.php");
    die();
?>
