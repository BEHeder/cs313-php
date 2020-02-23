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
    $game = $db->prepare("SELECT * FROM game WHERE id = :gameId");
    $game->bindValue(':gameId', $gameId);
    $game->execute();

    $row = $game->fetch();
    $name = $row["name"];

    echo "
        Are you sure you want to delete $name?</br>
        <form action='./gameDelete2.php' method='POST'>
            <button name='answer' type='submit' value='Yes'>Yes</button>
            <button name='answer' type='submit' value='No'>No</button>
        </form>
    ";
?>