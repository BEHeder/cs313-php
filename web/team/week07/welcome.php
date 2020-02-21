<?php
    session_start();
    require("../../shared/dbConnect.php");
    $db = get_db();
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php
            if (isset($_SESSION["username"]))
            {
                echo "Welcome $_SESSION['username']";
            }
            else
            {
                header("Location: signin.php");
                die();
            }
        ?>
    </body>
</html>