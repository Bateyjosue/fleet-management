<?php
$id = $_GET['id'];
$sql = "DELETE FROM `tbl_book_trip` WHERE id='$id'";
if (mysqli_query($connection, $sql)) {
    // header("Location: indexbill.php");
} else {
    echo "Not deleted";
}
mysqli_close($connection);
