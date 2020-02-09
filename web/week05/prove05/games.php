<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>List of Games</h1>
        <ul>
            <?php 
                require "../../shared/dbConnect.php";
                $db = get_db();

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