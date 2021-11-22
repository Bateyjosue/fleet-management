<?php

$id = $_GET['id'];

$conn = mysqli_connect("begl9q2aqo2yag9pw4jb-mysql.services.clever-cloud.com", "ubeptibrepcuncym", "NGuqOFbgyHyLwhJC67JL", "begl9q2aqo2yag9pw4jb");

$sql = "DELETE FROM `booking` WHERE booking_id='$id'";
echo $sql;
$result = mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql)) {
    header("Location: bookinglist.php");
} else {
    echo "Not deleted";
}
