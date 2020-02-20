<?php
    session_start();
    require("../../shared/dbConnect.php");
    $db = get_db();

    $username = $_POST['usernameIn'];
    $password = $_POST['passwordIn'];

    try
    {
        $query = "SELECT * FROM w7_user WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
            $passwordRight = $row['password'];
            if (password_verify($password, $passwordRight))
            {

            }
            else
            {
                
            }
        }
    }
    catch (Exception $ex)
    {
        echo "Error with DB. Details: $ex";
        die();
    }

    header("Location: signin.php");
    die();
?>
