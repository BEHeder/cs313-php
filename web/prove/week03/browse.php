<?php session_start(); ?>
<!DOCTYPE html>
    <head>

    </head>
    <body>
        <h1>Browse Items</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <input type="checkbox" name="item1" value="Milk">Milk<br>
            <input type="checkbox" name="item2" value="Bread">Bread<br>
            <input type="checkbox" name="item3" value="Eggs">Eggs<br>
            <input type="checkbox" name="item4" value="Peanut Butter">Peanut Butter<br>
            <input type="checkbox" name="item5" value="Jam">Jam<br>
            <input type="checkbox" name="item6" value="Cereal">Cereal<br>
            <input type="checkbox" name="item7" value="Butter">Butter<br>
            <input type="checkbox" name="item8" value="Ham">Ham<br>
            <input type="checkbox" name="item9" value="Barbecue Sauce">Barbecue Sauce<br>
            <input type="submit" name="Submit" value="Add to Cart">
        </form>
        
        <a href="./cart.php">Shopping Cart</a><br>

        <?php
            if(isset($_POST["Submit"])) {
                session_unset();
                for($i = 1; $i <= 9; $i++) {
                    if(isset($_POST["item" . $i]))
                        $_SESSION["item" . $i] = $_POST["item" . $i];
                }
            }
        ?>
    </body>
</html>