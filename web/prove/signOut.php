<?php
    session_start();
    unset($_SESSION["username"]);
    echo "You've successfully logged out! Redirecting in 3 seconds...</br>";
    header("refresh: 3; url = ./signIn.php");
    die();
?>