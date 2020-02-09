<?php 
    require "../../shared/dbConnect.php";
    $db = get_db();

    $games = $db->prepare("SELECT * FROM game");
    $games->execute();

    while ($row = $events->fetch(PDO::FETCH_ASSOC))
    {
        $name = $row["name"];
        echo "<p>$name</p>";
    }
?>