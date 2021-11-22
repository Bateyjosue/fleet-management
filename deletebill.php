<?php

$id = $_GET['id'];

$connection = mysqli_connect("begl9q2aqo2yag9pw4jb-mysql.services.clever-cloud.com", "ubeptibrepcuncym", "NGuqOFbgyHyLwhJC67JL", "begl9q2aqo2yag9pw4jb");
$sql = "DELETE FROM bill WHERE bill_id='$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql)) {
    header("Location: indexbill.php");
} else {
    echo "Not deleted";
}
