<?php
include 'server.php';
session_start();

$veh_id = $_GET['busid'];

$sql = "SELECT * FROM `tbl_vehicles` WHERE plate_number='$veh_id'";
//echo $sql;
$res = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($res);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>vehicle management system</title>

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

    <?php include 'navbar.php'; ?>
    <div class="container" style="margin-top: 20px; margin-bottom: 20px;">


    </div>

    <div class="container">
        <div class="row">
            <div class="fb-profile-text" id="h1">
                <h2><?php echo $row['plate_number']; ?></h2>
            </div>
            <hr>
            <div class="col-sm-3">
                <div class="fb-profile">
                    <!-- <?php echo '<img src="data:image/png;base64,' . base64_encode($row['photo']) . '"/>'; ?> -->
                    <img src="picture/cars/<?php echo $row['photo']?>" alt="" srcset="" width="200px" height="200px">

                </div>
            </div>

            <div class="col-sm-9">
                <div data-spy="scroll" class="tabbable-panel">
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs ">
                            <li class="active">
                                <a href="#tab_default_1" data-toggle="tab">
                                    About Vehicle </a>
                            </li>

                            <!--
                    <li>
                    <a href="#tab_default_2" data-toggle="tab">
                    Bill </a>
                    </li>
                    -->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_default_1">

                                <h4><strong>Brand</strong></h4>
                                <p><?php echo $row['brand']; ?></p>

                                <h4><strong>Color</strong></h4>
                                <p><?php echo $row['color']; ?></p>

                                <h4><strong>Registration No</strong></h4>
                                <p>
                                    <?php echo $row['plate_number']; ?>
                                </p>
                                <h4><strong>Type</strong></h4>
                                <p><?php echo $row['vehicle_type']; ?></p>

                                <h4><strong>Chesis No</strong></h4>
                                <p><?php echo $row['chasis_number']; ?></p>
                                <h4><strong>Vehicle Registration Date</strong></h4>
                                <p><?php echo $row['created_at']; ?></p>

                                <h4><strong>Description</strong></h4>
                                <p><?php echo $row['vehicle_description']; ?></p>

                            </div>

                            <?php //if($_SESSION['username']!= null) {  
                            ?>

                            <!--
                    <div class="tab-pane" id="tab_default_2">
                      <div class="row">
                      <div class="col-sm-10">
                       <?php //include 'insertbill.php';
                        ?>
                          
                          <?php // } 
                            ?>
                      </div>
                      </div>
                    </div>  
                    -->

                        </div>





                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /container fluid-->
    <div class="container">
        <div class="col-sm-12">

        </div>
    </div>
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