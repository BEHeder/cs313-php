<?php
    session_start();
	require("../shared/dbConnect.php");
    $db = get_db();
    if (!isset($_SESSION['username']))
    {
        header("Location: ./signIn.php");
        die();
    }
?>
        <h1>List of Games</h1>
        <a href="./gameAdd.php">Add Game</a></br>
        <a href="./signOut.php">Sign Out</a></br>
        <ul>
            <?php 
                $games = $db->prepare("SELECT * FROM game");
                $games->execute();

                while ($row = $games->fetch(PDO::FETCH_ASSOC))
                {
                    $name = $row["name"];
                    $gameId = $row["id"];
                    echo "<li><a href='./gameDetails.php?gameId=$gameId'>$name</a></li>";
                }
            ?>
        </ul>
    </body>
</html>