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
                            SET name = :gName, 
                            genre_id = :genre, 
                            game_type = :gType, 
                            age_min = :age, 
                            len_lower = :loLen, 
                            len_upper = :upLen, 
                            num_players_min = :minPly, 
                            num_players_max = :maxPly
                            WHERE id = :gameId");
    $update->bindValue(':gameId', $gameId);
	$update->bindValue(':gName', $name);
	$update->bindValue(':genre', $genre_id);
	$update->bindValue(':gType', $game_type);
	$update->bindValue(':age', $age_min);
	$update->bindValue(':loLen', $len_lower);
	$update->bindValue(':upLen', $len_upper);
	$update->bindValue(':minPly', $num_players_min);
	$update->bindValue(':maxPly', $num_players_max);
    $update->execute();

    header("Location: ./gameDetails.php?gameId=$gameId");
    die();
?>