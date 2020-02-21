<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php
	require("../shared/dbConnect.php");
	$db = get_db();
?>
<body>
   <div class="container" style="margin-top:50px;">
      <form action="insert.php" method="POST">
         <div class="form-row">
            <div class="col">
               <input type="text" class="form-control" placeholder="Game name" name="gName">
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
                        echo "<option value='$id'>$genre</option>";
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
                        echo "<option value='$id'>$gType</option>";
                     }
                  ?>
               </select>
            </div>
            <div class="col">
               <input type="number" class="form-control" placeholder="0" name="age">
            </div>
            <div class="col">
               <input type="number" class="form-control" placeholder="1" name="loLen">
            </div>
            <div class="col">
               <input type="number" class="form-control" placeholder="1" name="upLen">
            </div>
            <div class="col">
               <input type="number" class="form-control" placeholder="1" name="minPly">
            </div>
            <div class="col">
               <input type="number" class="form-control" placeholder="1" name="maxPly">
            </div>
            <div class="col">
               <button class="btn btn-primary" type="submit">Add Game</button>
            </div>
         </div>
      </form>
   </div>
</body>