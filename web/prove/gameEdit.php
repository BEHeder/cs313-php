<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php
    session_start();
    require("../shared/dbConnect.php");
    $db = get_db();
    if (!isset($_SESSION['username']))
    {
        header("Location: ./signIn.php");
        die();
    }

    $gameId = $_POST["gameId"];


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
?>

<body>
   <div class="container" style="margin-top:50px;">
      <div class="form-row">
         <div class="col">
            Game Name
         </div>
         <div class="col">
            Genre
         </div>
         <div class="col">
            Game Type
         </div>
         <div class="col">
            Age Minimum
         </div>
         <div class="col">
            Minimum Typical Length
         </div>
         <div class="col">
            Maximum Typical Length
         </div>
         <div class="col">
            Minimum # of Players
         </div>
         <div class="col">
            Maximum # of Players
         </div>
         <div class="col">
            Back to <a href="./games.php">Games</a>
         </div>
      </div>
      <form action="./gameEdit2.php" method="POST">
         <div class="form-row">
            <div class="col">
               <input type="number" name="gameId" value=<?php echo "$gameId";?> hidden>
               <input type="text" class="form-control" value=<?php echo "$name";?> name="gName">
            </div>
            <div class="col">
               <select id="inputGenre" class="form-control" name="genre">
                  <?php
                     $statement = $db->prepare("SELECT * FROM genre");
                     $statement->execute();
                     while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                     {
                        $id = $row["id"];
                        $genre = $row["name"];
                        echo "<option value='$id'";
                        if ($id == $genre_id) {echo " selected";}
                        echo ">$genre</option>";
                     }
                  ?>
               </select>
            </div>
            <div class="col">
               <select id="inputType" class="form-control" name="gType">
                  <?php
                     $statement = $db->prepare("SELECT * FROM game_type");
                     $statement->execute();
                     while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                     {
                        $id = $row["id"];
                        $gType = $row["name"];
                        echo "<option value='$id'";
                        if ($id == $game_type) {echo " selected";}
                        echo ">$gType</option>";
                     }
                  ?>
               </select>
            </div>
            <div class="col">
               <input type="number" class="form-control" value=<?php echo "$age";?> name="age">
            </div>
            <div class="col">
               <input type="number" class="form-control" value=<?php echo "$len_lower";?> name="loLen">
            </div>
            <div class="col">
               <input type="number" class="form-control" value=<?php echo "$len_upper";?> name="upLen">
            </div>
            <div class="col">
               <input type="number" class="form-control" value=<?php echo "$playersMin";?> name="minPly">
            </div>
            <div class="col">
               <input type="number" class="form-control" value=<?php echo "$playersMax";?> name="maxPly">
            </div>
            <div class="col">
               <button class="btn btn-primary" type="submit" name="editGame">Edit Game</button>
            </div>
         </div>
      </form>
   </div>
</body>