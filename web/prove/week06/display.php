<?php
	require("../../shared/dbConnect.php");
	$db = get_db();
?>
	<body>
		<div class="container">
         <?php
            $gameId = $_GET['gameId'];
            $statement = $db->prepare('SELECT * FROM game WHERE ID = :gameId');
            $statement->bindValue(':gameId', $gameId);
            $statement->execute();
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
               $id = $row['id'];
               $name = $row['name'];
               $genre_id = $row['genre_id'];
               $game_id = $row['game_type'];
               $age = $row['age_min'];
               $len_lower = $row['len_lower'];
               $len_upper = $row['len_upper'];
               $minPly = $row['num_players_min'];
               $maxPly = $row['num_players_max'];
               $genres = $db->prepare("SELECT * FROM genre WHERE ID = $genre_id");
               $genres->execute();
               while ($geRow = $genres->fetch(PDO::FETCH_ASSOC))
               {
                  $genre = $geRow['name'];
               }
               $gTypes = $db->prepare("SELECT * FROM game_type WHERE ID = $game_id");
               $gTypes->execute();
               while ($gTRow = $gTypes->fetch(PDO::FETCH_ASSOC))
               {
                  $gType = $gTRow['name'];
               }
               echo "<h1>$name</h1>";
               echo "<p>$genre</p>";
               echo "<p>$gType</p>";
               echo "<p>Age: $age</p>";
               echo "<p>Typical Minimum Playtime: $len_lower</p>";
               echo "<p>Typical Maximum Playtime: $len_upper</p>";
               echo "<p>Minimum # of Players: $minPly</p>";
               echo "<p>Maximum # of Players: $maxPly</p>";
            }
         ?>

		</div>
	</body>
</html>