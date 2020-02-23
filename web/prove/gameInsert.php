<?php
session_start();
$gName = $_POST['gName'];
$genre = $_POST['genre'];
$gType = $_POST['gType'];
$age = $_POST['age'];
$loLen = $_POST['loLen'];
$upLen = $_POST['upLen'];
$minPly = $_POST['minPly'];
$maxPly = $_POST['maxPly'];

require("../shared/dbConnect.php");
$db = get_db();

try
{
	$query = 'INSERT INTO game (name, genre_id, game_type, age_min, 
								len_lower, len_upper, num_players_min, num_players_max) 
		VALUES (:gName, :genre, :gType, :age, :loLen, :upLen, :minPly, :maxPly)';
	$statement = $db->prepare($query);
	$statement->bindValue(':gName', $gName);
	$statement->bindValue(':genre', $genre);
	$statement->bindValue(':gType', $gType);
	$statement->bindValue(':age', $age);
	$statement->bindValue(':loLen', $loLen);
	$statement->bindValue(':upLen', $upLen);
	$statement->bindValue(':minPly', $minPly);
	$statement->bindValue(':maxPly', $maxPly);
	$statement->execute();
	
	$gameId = $db->lastInsertId("game_id_seq");
}
catch (Exception $ex)
{
	echo "Error with DB. Details: $ex";
	die();
}
header("Location: gameDetails.php/?gameId=$gameId");

die(); 
?>
