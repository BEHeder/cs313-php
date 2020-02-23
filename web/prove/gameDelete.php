<?php
    session_start();
    require("../shared/dbConnect.php");
    $db = get_db();
    if (!isset($_SESSION['username']))
    {
        header("Location: ./signIn.php");
        die();
    }

    $gameId = $_POST["gameId"];
    echo "gameDelete coming soon!</br>";
    echo "$gameId</br>";
?>