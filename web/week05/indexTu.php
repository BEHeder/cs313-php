<?php
    require "dbConnect.php";
    $db = get_db();

    $family_members = $db->prepare("SELECT * FROM w5_family_members"); //prepare() helps ensure you have
    $family_members->execute();                                        //proper commands/data...?

    while ($fRow = $family_members->fetch(PDO::FETCH_ASSOC))
    {
        $first_name = $fRow["first_name"];
        $last_name = $fRow["last_name"];
        $relationship_id = $fRow["relationship_id"];

        $relationships = $db->prepare("SELECT description FROM w5_relationships WHERE id = $relationship_id");
        $relationships->execute();
        while ($rRow = $relationships->fetch(PDO::FETCH_ASSOC))
        {
            $relationship = $rRow["description"];
        }

        echo "<p>$first_name $last_name is my $relationship ($relationship_id)</p>";
    }
?>