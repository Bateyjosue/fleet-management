<?php
if (!isset($_SESSION)) {
    session_start();
}
// initialize connection
include 'server.php';
$msg = "";

$id = $_GET['id'];
$query = "SELECT * FROM tbl_driver WHERE id='$id'";
$result = mysqli_query($connection, $query);
$rows = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $vehicle_id = $_POST['vehicle_id'];
    $national_id = $_POST['national_id'];
    $driving_license = $_POST['driving_license'];
    $license_validity = $_POST['license_validity'];
    $full_name = $_POST['full_name'];
    if ($_FILES['file']['name']){
        $photo = $_FILES['file']['name'];
    } else{
        $photo = $_POST['photo_name'];
    }
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $status = $_POST['status'];
    // $photo=$_FILES['file']['name'];

    //image Upload

    move_uploaded_file($_FILES['file']['tmp_name'], "picture/" . $_FILES['file']['name']);

    $res = false;
    $insert_query = "UPDATE  `tbl_driver` SET `vehicle_id`= '$vehicle_id', `national_ID` = '$national_id', `driving_license` = '$driving_license',
                    `license_validity` = '$license_validity', `full_name`= '$full_name', `phone` = '$phone', `email`= '$email', 
                    `photo` = '$photo', `address` ='$address', `status`='$status' where id= '$id'";

    $res = mysqli_query($connection, $insert_query);

    if ($res == true) {
        header('location:admin.php');
        $msg = "<script language='javascript'>
                    swal(
                    'Success!',
                    'Registration Completed!',
                    'success'
                    );
                </script>";
    } else {
        die('unsuccessful' . mysqli_error($connection));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Driver</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
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

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include 'navbar_admin.php'; ?>
        <?PHP include 'sidebar.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Update Driver Information</h1>
                            <?php echo $msg; ?>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"> New Driver</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-9 col-6 ">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                <div class="input-group d-flex mb-4">
                                    <div class="col-lg-2 pt-1">
                                        <label for="" class="">
                                            <span class="input-group-addon"><b>Vehicle ID</b></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input id="drname" type="text" class="form-control" name="vehicle_id" placeholder="Vehicle PlatNumber" value="<?php echo $rows['vehicle_id'] ?>">
                                    </div>
                                </div>
                                <div class="input-group d-flex mb-4">
                                    <div class="col-lg-2 pt-1">
                                        <span class="input-group-addon mr-5"><b>National ID</b></span>
                                    </div>
                                    <div class="col-lg-10">
                                        <input id="drmobile" type="text" class="form-control" name="national_id" placeholder="National ID" value="<?php echo $rows['national_ID'] ?>">
                                    </div>
                                </div>
                                <div class="input-group d-flex mb-4">
                                    <div class="col-lg-2 pt-1">
                                        <span class="input-group-addon"><b>Driving License</b></span>
                                    </div>
                                    <div class="col-lg-10">
                                        <input id="drjoin" type="text" class="form-control" name="driving_license" placeholder="Driving License" value="<?php echo $rows['driving_license'] ?>">
                                    </div>
                                </div>
                                <div class="input-group d-flex mb-4">
                                    <div class="col-lg-2 pt-1">
                                        <span class="input-group-addon"><b>License Validity</b></span>
                                    </div>
                                    <div class="col-lg-10">
                                        <input id="drnid" type="date" class="form-control" name="license_validity" placeholder="License Valid until" value="<?php echo $rows['license_validity'] ?>">
                                    </div>
                                </div>
                                <div class="input-group d-flex mb-4">
                                    <div class="col-lg-2 pt-1">
                                        <span class="input-group-addon"><b>Full Name</b></span>
                                    </div>
                                    <div class="col-lg-10">
                                        <input id="drlicense" type="text" class="form-control" name="full_name" placeholder="Full Name" value="<?php echo $rows['full_name'] ?>">
                                    </div>
                                </div>
                                <div class="input-group d-flex mb-4">
                                    <div class="col-lg-2 pt-1">
                                        <span class="input-group-addon"><b>Phone</b></span>
                                    </div>
                                    <div class="col-lg-10">
                                        <input id="drlicensevalid" type="phone" class="form-control" name="phone" placeholder="Phone Number" value="<?php echo $rows['phone'] ?>">
                                    </div>
                                </div>
                                <div class="input-group d-flex mb-4">
                                    <div class="col-lg-2 pt-1">
                                        <span class="input-group-addon"><b>Email Address</b></span>
                                    </div>
                                    <div class="col-lg-10">
                                        <input id="drlicensevalid" type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $rows['email'] ?>">
                                    </div>
                                </div>
                                <div class="input-group d-flex mb-4 pl-5">
                                    <img src="./picture/drivers/<?php echo $rows['photo'] ?>" alt="" height="120" width="120">
                                    <input type="text" name="photo_name" id="" value="<?php echo $rows['photo'] ?>">
                                </div>
                                <div class="input-group d-flex mb-4">
                                    <div class="col-lg-2 pt-1">
                                        <span class="input-group-addon"><b>Photo</b></span>
                                    </div>
                                    <div class="col-lg-10 p-0">
                                        <input type="file" class="form-control p-1" name="file" value="<?php echo $rows['photo'] ?>">
                                    </div>
                                </div>
                                <div class="input-group d-flex mb-4">
                                    <div class="col-lg-2 pt-1">
                                        <span class="input-group-addon"><b>Address</b></span>
                                    </div>
                                    <div class="col-lg-10">
                                        <input id="drlicensevalid" type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $rows['address'] ?>">
                                    </div>
                                </div>
                                <div class="input-group d-flex mb-4">
                                    <div class="col-lg-2 pt-1">
                                        <span class="input-group-addon"><b>Address</b></span>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="radio" name="status" id="" value="1" class="mr-2 mt-1" <?php if ($rows['status'] ==1) echo 'checked';?>> Available
                                        <input type="radio" name="status" id="" value="0" class="mr-2 ml-4 mt-1" <?php if ($rows['status'] ==0) echo 'checked';?>>  Unavailable
                                    </div>
                                </div>
                                <div class="input-group d-flex mb-4">
                                    <div class="col-lg-7">
                                </div>
                                    <input type="submit" name="submit" class="btn btn-primary rounded-pill fs-4 align-right col-lg-5 icon-fa-arrow p-2">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
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
    </div>
</body>

</html>