<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["username"]);
header("Location: login.php");
    
    // session_start();
    //echo $_SESSION['user'];
    //echo 'session has destroyed';
