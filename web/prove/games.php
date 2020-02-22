<?php
    session_start();
	require("../shared/dbConnect.php");
    $db = get_db();
    if (!isset($_SESSION['username']))
    {
        header("Location: ./signIn.php");
        die();
    }
    // if (!isset($_SESSION['games'])) {
    //     $_SESSION['games'] = 
    // }
?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>List of Games</h1>
        <p><a href="./signOut.php">Sign Out</a></p>
        <ul>
            <?php 
                $games = $db->prepare("SELECT * FROM game");
                $games->execute();

                while ($row = $games->fetch(PDO::FETCH_ASSOC))
                {
                    $name = $row["name"];
                    echo "<li>$name</li>";
                }
            ?>
        </ul>
    </body>
</html>