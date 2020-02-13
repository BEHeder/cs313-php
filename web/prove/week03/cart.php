<?php session_start(); ?>
<!DOCTYPE html>
    <head>

    </head>
    <body>
        <h1>View Cart</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <?php
                foreach($_SESSION as $item) {
                    echo "<input type='checkbox' name='" . $item . "' value='" . $item . "'>";
                    echo $item . "<br>";
                }
            ?>
            <input type="submit" name="Remove" value="Remove from Cart">
        </form>
        <a href="./browse.php">Browse Items</a><br>
        <a href="./checkout.php">Checkout</a><br>

        <?php
            if(isset($_POST["Remove"])) {
                foreach($_POST as $item) {
                    if(isset($item))
                        $_SESSION["item" . $i] = $_POST["item" . $i];
                }
            }
        ?>
    </body>
</html>