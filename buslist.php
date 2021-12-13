<?php
include 'server.php';
session_start();
$user = $_SESSION['id'];
$sql = "SELECT * FROM `vehicle_list`";
$res = mysqli_query($connection, $sql);
// $rs = mysqli_fetch_assoc($res);
//     $plate = $rs['plate_number'];
// $sql = "SELECT * FROM `tbl_driver` where `vehicle_id`= '$plate";
// $result = mysqli_query($connection, $sql);
// $rw = mysqli_fetch_assoc($result);
// $full = $rs['full_name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>List of Drivers</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="style.css"> -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

</head>

<body>

    <div id="myDiv">

        <?php include 'navbar.php'; ?>
        <br><br><br>
        <div class="">
            <?php
            if (mysqli_num_rows($res) > 0) { ?>

                <div class="">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-md-6 foo">
                            <div class="page-header">
                                <h1 class="animated bounceIn" style="text-align: center;">Vehicle List</h1>
                            </div>
                            <table class="table">
                                <thead>
                                    <th>Vehicle Picture</th>
                                    <th>Driver</th>
                                    <th>Vehicle Plate Number</th>
                                </thead>

                                <?php while ($row = mysqli_fetch_assoc($res)) {  ?>
                                    <tbody>
                                        <tr>
                                            <?php if ($row['veh_status'] == 1){?>
                                                <td><img height="80px" width="120px" src="picture/cars/<?php echo $row["photo"]; ?>" alt="dp"></td>
                                                <td class="pt-5">
                                                    <?php 
                                                    echo $row['full_name'];
                                                    // mysqli_close($connection);
                                                    ?>
                                                </td>
                                                <td class="pt-5"><a class="mt-4" href="busprofile.php?busid=<?php echo $row["plate_number"]; ?>"> <?php echo strtoupper($row["plate_number"]) ?></a></td>
                                                <?php if ($row["veh_status"] == 1) { ?>
                                                    <td class="pt-5">
                                                        <div class="badge badge-primary rounded-pill p-2">
                                                            <a href="book.php?id=<?php echo $row['plate_number']; ?>&user=<?php echo $user; ?>" class="fs-2 text-light">Book Now >></a>
                                                        </div>
                                                    </td>
                                                <?php } else  if ($row["veh_status"] == 0) { ?>
                                                    <td class="pt-5">
                                                        <div class="badge badge-danger rounded-pill p-2">
                                                            <a href="#" class="fs-2 text-light">Not Available >></a>
                                                        </div>
                                                    </td>
                                                <?php } 
                                            }?>
                                        </tr>
                                    </tbody>
                            <?php }
                            } ?>
                            </table>
                        </div>
                        <div class="col-md-3"></div>
                    </div>

                </div>

        </div>
    </div>

    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>


    <script>
        window.sr = ScrollReveal();
        sr.reveal('.foo', {
            duration: 800
        });
        sr.reveal('.foo1', {
            duration: 800,
            origin: 'top'
        });
    </script>



    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- BoBootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</body>

</html>