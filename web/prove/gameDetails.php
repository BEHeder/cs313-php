<?php 
    session_start();
    require "../shared/dbConnect.php";
    $db = get_db();
    $gameId = $_GET["gameId"];

    $game = $db->prepare("SELECT * FROM game WHERE id = :gameId");
    $game->bindValue(':gameId', $gameId);
    $game->execute();

    $row = $game->fetch();
    $name = $row["name"];
    $genre_id = $row["genre_id"];
    $game_type = $row["game_type"];
    $age = $row["age_min"];
    $len_lower = $row["len_lower"];
    $len_upper = $row["len_upper"];
    $playersMin = $row["num_players_min"];
    $playersMax = $row["num_players_max"];

    $genres = $db->prepare("SELECT * FROM genre WHERE id = $genre_id");
    $genres->execute();
    $genreRow = $genres->fetch();
    $genre = $genreRow["name"];

    $gameTypes = $db->prepare("SELECT * FROM game_type WHERE id = $game_type");
    $gameTypes->execute();
    $gTypeRow = $gameTypes->fetch();
    $gType = $gTypeRow["name"];

    $gLists = $db->prepare("SELECT * FROM wishlist WHERE game_id = :gameId");
    $gLists->bindValue(':gameId', $gameId);
    $gLists->execute();
    $isElsewhere = false;
    while ($row = $gLists->fetch(PDO::FETCH_ASSOC))
    {
        $userId = $row["user_id"];
        $users = $db->prepare("SELECT * FROM game_user WHERE id = $userId");
        $users->execute();
        $uRow = $users->fetch();
        if ($uRow["username"] != $_SESSION["username"])
        {
            $isElsewhere = true;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Game Details</h1>
        Back to <a href="./games.php">Games</a></br>
        <?php
            echo "Name: $name</br>";
            echo "Genre: $genre</br>";
            echo "Game Type: $gType</br>";
            echo "Age Minimum: $age</br>";
            echo "Typical Length: $len_lower-$len_upper minutes</br>";
            echo "# of Players: $playersMin-$playersMax</br>";
        ?>
        <form action="./gameEdit.php" method="POST">
            <input type="number" name="gameId" value=<?php echo "$gameId";?> hidden>
            <input type="submit" name="edit" value="Edit"
            <?php if ($isElsewhere) {echo "disabled";}?>></br>
        </form>
        <form action="./gameDelete.php" method="POST">
            <input type="number" name="gameId" value=<?php echo "$gameId";?> hidden>
            <input type="submit" name="delete" value="Delete"
            <?php if ($isElsewhere) {echo "disabled";}?>></br>
        </form>
    </body>
</html>