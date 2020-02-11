<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php
    require "../../shared/dbConnect.php";
    $db = get_db();
?>
<body>
    <div class="container" style="margin-top:50px;">
        <form action="insert.php" method="POST">
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Book" name="book">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Chapter" name="chapter">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Verse" name="verse">
                </div>
                <div class="col">
                    <textarea class="form-control" name="content">Content</textarea>
                </div>
                <div class="col">
                    <!-- <input type="checkbox" class="form-control" name="topic1" value="Faith">Faith<br> -->
                    <?php
                        $statement = $db->prepare("SELECT * FROM topic");
                        $statement->execute();
                        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                        {
                            $id = $row["id"];
                            $topic = $row["name"];
                            echo "<input type='checkbox' class='form-control' name='$topic' value='$id'>$topic<br>";
                        }
                    ?>
                </div>
                <div class="col">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>