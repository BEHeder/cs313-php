<?php 
    session_start();
    require "../shared/dbConnect.php";
    $db = get_db();

    $events = $db->prepare("SELECT * FROM w5_EVENT");
    $events->execute();

    while ($row = $events->fetch(PDO::FETCH_ASSOC))
    {
        $name = $row["name"];
        $image = $row["image"];

        echo "<p>$name <img src='$image'></p>";

    }
?>