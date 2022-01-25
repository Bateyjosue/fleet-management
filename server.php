<?php
$connection = mysqli_connect("localhost", "root", "", "fleet-management");
if ($connection === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// echo "Connect Successfully. Host info: " . mysqli_get_host_info($connection);
