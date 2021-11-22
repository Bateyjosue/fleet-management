<?php
   $connection = mysqli_connect("begl9q2aqo2yag9pw4jb-mysql.services.clever-cloud.com", "ubeptibrepcuncym", "NGuqOFbgyHyLwhJC67JL", "begl9q2aqo2yag9pw4jb");
    session_start();

    $id= $_GET['id'];

    $sql= "UPDATE `tripcost` SET `paid`='1' WHERE booking_id='$id'";
    $result= mysqli_query($connection,$sql);

    if($result){
        header ('Location: bookinglist.php');
    }
