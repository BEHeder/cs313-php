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
    $name = $_POST["gName"];
    $genre_id = $_POST["genre"];
    $game_type = $_POST["gType"];
    $age_min = $_POST["age"];
    $len_lower = $_POST["loLen"];
    $len_upper = $_POST["upLen"];
    $num_players_min = $_POST["minPly"];
    $num_players_max = $_POST["maxPly"];

    $update = $db->prepare("UPDATE game 
                            SET name = $name, 
                            genre_id = $genre_id, 
                            game_type = $game_type, 
                            age_min = $age_min, 
                            len_lower = $len_lower, 
                            len_upper = $len_upper, 
                            num_players_min = $num_players_min, 
                            num_players_max = $num_players_max
                            WHERE id = :gameId");
    $update->bindValue(':gameId', $gameId);
    $update->execute();

    header("Location: ./gameDetails.php?gameId=$gameId");
    die();
?>