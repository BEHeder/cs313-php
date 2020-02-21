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
                $username = $_SESSION["username"];
                echo "Welcome $username";
            }
            else
            {
                header("Location: signin.php");
                die();
            }
        ?>
    </body>
</html>