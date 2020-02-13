<?php
   // Start the session
   session_start();
?>
<!DOCTYPE html>
<html>
   <body>
      <?php
         // remove previous session variable
         unset($_SESSION['pictureUrl']);
         // Set session variables
         $_SESSION["favcolor"] = "green";
         $_SESSION["favanimal"] = "dolphin";
         // echo that variables have been set
         echo "Session variables have been set.";
?>
      <a href="thursdaySession2.php">Check the variables on another page</a>

      <h3>Just for kicks, let's try this with a form</h3>
      <form action="" method="post">
         <input type="text" name="picture">
         <input type="submit" name="Submit" value="Submit!">
      </form>
      <?php 
         if(isset($_POST['Submit'])) {
            $_SESSION['pictureUrl'] = $_POST['picture'];
         }
      
      ?>
   </body>
</html>