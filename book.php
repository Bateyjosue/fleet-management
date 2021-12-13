<?php
include 'server.php';
session_start();
$user = $_SESSION['username'];
$useri = $_SESSION['id'];
$id = $_GET['id'];
$user_id = (int)$useri;
echo $user_id;
if ($_SESSION['id'] == '') {
    header('Location:login.php');
} else {
    // header('Location:book.php');
    $s = "SELECT * FROM `tbl_users` WHERE username='$user'";
    $r = mysqli_query($connection, $s);
    $rw = mysqli_fetch_assoc($r);

    $sql = "SELECT * FROM `tbl_book_trip` WHERE id='$id'";
    $res = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($res);

    if (isset($_POST['book'])) {
        $user_id = $_POST['user_id'];
        $vehicle_id = $_POST['vehicle_id'];
        $destination = $_POST['destination'];
        $pickup = $_POST['pickup'];
        $return_date = $_POST['return_date'];
        $estimated_km = $_POST['estimated_km'];
        $cost_km = $_POST['cost'];
        $extra_cost = $_POST['extra_cost'];
                $insert = "INSERT INTO `tbl_book_trip`(`user_id`, `vehicle_id`, `destination`,`pickup_point`,`return_date`,`estimated_km`, `cost_km`,`extra_cost`)
                    VALUES ($useri,'$id','$destination','$pickup','$return_date',$estimated_km,$cost_km, $extra_cost);";
                $result = mysqli_query($connection, $insert);
                if ($result == true) {
                    $query = "UPDATE `tbl_vehicles` SET `status` = 0 WHERE `vehicle_id` = $id";
                    $r = mysqli_query($connection, $query);
                    header('location:index.php');
                } else {
                    $msg = die('Unsuccessful' . mysqli_error($connection));
                }
    }
}
mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Vehicle | Booking</title>
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

<body class="hold-transition layout-fixed">
    <div class="wrapper">
        <?php include 'navbar.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Booking Information</h1>
                            <?php echo $msg; ?>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-9 col-6 ">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="User ID" name="user_id" value="<?php echo $user_id; ?>" disabled>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-car"></i></span>
                                    </div>
                                    <input type="text" class="form-control" disabled placeholder="Plate Number" value="<?php echo $id ?>" name="vehicle_id">
                                </div>
                                <div class="input-group mb-3 d-flex">
                                    <div class="input-group-prepend col-lg-6 pl-0">
                                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                                        <input type="text" class="form-control" placeholder="Destination" name="destination">
                                    </div>
                                    <div class="input-group-prepend col-lg-6 pr-0">
                                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                                        <input type="text" class="form-control" placeholder="pick up Point" name="pickup">
                                    </div>
                                </div>
                                <div class="input-group mb-0">
                                    <div>
                                        <label for="">Return Date</label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                    </div>
                                    <input type="date" class="form-control" placeholder="Return Date" name="return_date">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Estimated Km" name="estimated_km">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Km</span>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Frw</span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Cost/Km" name="cost">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Frw</span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Extra Cost" name="extra_cost">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <input type="submit" value="Book now" class="btn btn-primary" name="book">
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
</body>

</html>