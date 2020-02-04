<?php
    require "dbConnect.php";
    echo "<h1>Scripture Resources</h1></br>";
    $db = get_db(); //if the function doesn't return anything, then this could throw a 500 error

    $scriptures = $db->prepare("SELECT * FROM scriptures"); //prepare() helps ensure you have
    $scriptures->execute();                                        //proper commands/data...?

    while ($row = $scriptures->fetch(PDO::FETCH_ASSOC))
    {
        $book = $row["book"];
        $chapter = $row["chapter"];
        $verse = $row["verse"];
        $content = $row["content"];

        echo "<p><b>$book $chapter:$verse</b> - \"$content\"</p>";
    }
?>