<?php
if (!isset($_SESSION)) {
    session_start();
}


$connection = mysqli_connect("begl9q2aqo2yag9pw4jb-mysql.services.clever-cloud.com", "ubeptibrepcuncym", "NGuqOFbgyHyLwhJC67JL", "begl9q2aqo2yag9pw4jb");
$msg = "";


if (isset($_POST['submit'])) {
    $drname = $_POST['drname'];
    $drjoin = $_POST['drjoin'];
    $drmobile = $_POST['drmobile'];
    $drnid = $_POST['drnid'];
    $drlicense = $_POST['drlicense'];
    $drlicensevalid = $_POST['drlicensevalid'];
    $draddress = $_POST['draddress'];
    //$drphoto=$_FILES['file']['name'];
    $drphoto = $_FILES['file']['name'];

    //image Upload

    move_uploaded_file($_FILES['file']['tmp_name'], "picture/" . $_FILES['file']['name']);

    $res = false;
    $insert_query = "INSERT INTO `driver`(`drname`, `drjoin`, `drmobile`, `drnid`, `drlicense`, `drlicensevalid`, `draddress`, `drphoto`) VALUES ('$drname','$drjoin','$drmobile','$drnid','$drlicense','$drlicensevalid','$draddress','$drphoto')";

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
    <title>New Driver</title>
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
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="sweetalert2/sweetalert2.css">
        <script src="sweetalert2/sweetalert2.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="animate.css"> -->
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
                            <h1 class="m-0">New Driver Form</h1>
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
                                            <span class="input-group-addon"><b>Driver Name</b></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input id="drname" type="text" class="form-control" name="drname" placeholder="Name">
                                    </div>
                                </div>
                                <div class="input-group d-flex mb-4">
                                    <div class="col-lg-2 pt-1">
                                        <span class="input-group-addon mr-5"><b>Mobile</b></span>
                                    </div>
                                    <div class="col-lg-10">
                                        <input id="drmobile" type="text" class="form-control" name="drmobile" placeholder="Mobile No">
                                    </div>
                                </div>
                                <div class="input-group d-flex mb-4">
                                    <div class="col-lg-2 pt-1">
                                        <span class="input-group-addon"><b>Driver Joining Date</b></span>
                                    </div>
                                    <div class="col-lg-10">
                                        <input id="drjoin" type="date" class="form-control" name="drjoin" placeholder="Joining date">
                                    </div>
                                </div>
                                <div class="input-group d-flex mb-4">
                                    <div class="col-lg-2 pt-1">
                                        <span class="input-group-addon"><b>National ID</b></span>
                                    </div>
                                    <div class="col-lg-10">
                                        <input id="drnid" type="text" class="form-control" name="drnid" placeholder="Nid No">
                                    </div>
                                </div>
                                <div class="input-group d-flex mb-4">
                                    <div class="col-lg-2 pt-1">
                                        <span class="input-group-addon"><b>License No</b></span>
                                    </div>
                                    <div class="col-lg-10">
                                        <input id="drlicense" type="text" class="form-control" name="drlicense" placeholder="License No">
                                    </div>
                                </div>
                                <div class="input-group d-flex mb-4">
                                    <div class="col-lg-2 pt-1">
                                        <span class="input-group-addon"><b>License End Date</b></span>
                                    </div>
                                    <div class="col-lg-10">
                                        <input id="drlicensevalid" type="date" class="form-control" name="drlicensevalid" placeholder="Validity date">
                                    </div>
                                </div>
                                <div class="input-group d-flex mb-4">
                                    <div class="col-lg-2 pt-1">
                                        <span class="input-group-addon"><b>Driver Address</b></span>
                                    </div>
                                    <div class="col-lg-10">
                                        <textarea rows="5" id="draddress" type="text" class="form-control" name="draddress" placeholder="Address"> </textarea>
                                    </div>
                                </div>
                                <div class="input-group d-flex mb-4">
                                    <div class="col-lg-2 pt-1">
                                        <span class="input-group-addon"><b>Photo</b></span>
                                    </div>
                                    <div class="col-lg-10 p-0">
                                        <input type="file" class="form-control p-1" name="file">
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
</body>

</html>