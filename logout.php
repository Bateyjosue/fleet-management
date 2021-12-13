<?php
    session_start();
    unset($_SESSION["id"]);
    unset($_SESSION["username"]);
    header("Location: index.php");
    
    // session_start();
    //echo $_SESSION['user'];
    //echo 'session has destroyed';
