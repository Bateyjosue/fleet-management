<?php
include 'server.php';
session_start();
$user = $_SESSION['username'];
$s = "SELECT * FROM `tbl_users` WHERE username='$user'";
$r = mysqli_query($connection, $s);
$rw = mysqli_fetch_assoc($r);
$id = $_GET['id'];
$sql = "SELECT * FROM `tbl_book_trip` WHERE id='$id'";
$res = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($res);

if (isset($_POST['update'])) {
    $pay = $_POST['pay'];
    $confirm = $_POST['confirm_trip'];

    $insert = "UPDATE `tbl_book_trip` set `paid` =  '$pay', `confirm_trip` = '$confirm' WHERE `id` = '$id';";

    $result = mysqli_query($connection, $insert);
    if ($result == true) {
        header('location:admin.php');
    } else {
        $msg = die('Unsuccessful' . mysqli_error($connection));
    }
}
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

<body class="hold-transition  sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include 'navbar_admin.php'; ?>
        <?php include 'sidebar.php'; ?>
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
                                    <input type="text" class="form-control" placeholder="User ID" name="user_id" value="<?php echo $row['user_id']; ?>" disabled>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-car"></i></span>
                                    </div>
                                    <input type="text" class="form-control" disabled placeholder="Plate Number" value="<?php echo $row['vehicle_id']; ?>" name="vehicle_id">
                                </div>
                                <div class="input-group mb-3 d-flex">
                                    <div class="input-group-prepend col-lg-6 pl-0">
                                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                                        <input type="text" class="form-control" placeholder="Destination" name="destination" value="<?php echo $row['destination']; ?>" disabled>
                                    </div>
                                    <div class="input-group-prepend col-lg-6 pr-0">
                                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                                        <input type="text" class="form-control" placeholder="pick up Point" name="pickup" value="<?php echo $row['pickup_point']; ?>" disabled>
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
                                    <input type="date" class="form-control" placeholder="Return Date" name="return_date" value="<?php echo $row['return_date']; ?>" disabled>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Estimated Km" name="estimated_km" value="<?php echo $row['estimated_km']; ?>" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Km</span>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Frw</span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Cost/Km" name="cost" value="<?php echo $row['cost_km']; ?>" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Frw</span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Extra Cost" name="extra_cost" value="<?php echo $row['extra_cost']; ?>" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <div class="input-group mb-3 btn btn-light">
                                    <?php if ($row['confirm_trip'] == 1) { ?>
                                        Paid<input type="radio" name="pay" id="" value="0" disabled>
                                    <?php } else { ?>
                                        Confirm Payment<input type="radio" name="pay" id="" value="1" class="mt-2 ml-5">
                                    <?php } ?>
                                </div>
                                <div class="input-group mb-3 btn btn-light">
                                    <?php if ($row['confirm_trip'] == 1) { ?>
                                        Confirmed<input type="radio" name="confirm_trip" id="" value="0" disabled>
                                    <?php } else { ?>
                                        Confirm Trip<input type="radio" name="confirm_trip" id="" value="1" class="mt-2 ml-5">
                                    <?php } ?>
                                </div>

                                <input type="submit" value="Book now" class="btn btn-primary" name="update">
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