<?php
session_start();
include 'server.php';
$select_query = "SELECT * FROM `tbl_book_trip` ORDER BY id DESC";
$result = mysqli_query($connection, $select_query);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Booking list</title>
</head>

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
                            <h1 class="m-0">Boooking List</h1>
                            <?php echo $msg; ?>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"> Booking</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-12 col-6 ">
                            <table id="example1" class="table teble-bordered table-striped">
                                <thead>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Plate Number</th>
                                    <th>Destination</th>
                                    <th>Pickup Point</th>
                                    <th>Due Date</th>
                                    <th>Return Date</th>
                                    <th>Estimated Km</th>
                                    <th>Confirm Payment</th>
                                    <th>Confirm Trip</th>
                                    <th>Status Trip</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['user_id']; ?></td>
                                            <td><?php echo $row['vehicle_id']; ?></td>
                                            <td><?php echo $row['destination']; ?></td>
                                            <td><?php echo $row['pickup_point']; ?></td>
                                            <td><?php echo substr($row['created_at'], 0, 10); ?></td>
                                            <td><?php echo substr($row['return_date'], 0, 10); ?></td>
                                            <td><?php echo $row['estimated_km']; ?></td>
                                            <td>
                                                <?php if ($row['paid'] == 1)
                                                    echo "<span class='badge badge-success p-2 rounded-pill'>Paid</span>";
                                                else
                                                    echo "<span class='badge badge-warning p-2 rounded-pill'>Confirm Payment</span>";
                                                ?>
                                            </td>
                                            <td>
                                                <?php if ($row['confirm_trip'] == 1)
                                                    echo "<span class='badge badge-success p-2 rounded-pill'>Confirmed</span>";
                                                else
                                                    echo "<span class='badge badge-warning p-2 rounded-pill'>Confirm Trip</span>";
                                                ?>
                                            </td>
                                            <td>
                                                <?php if ($row['status'] == 1)
                                                    echo "<span class='badge badge-info p-2 rounded-pill'>Pending</span>";
                                                else
                                                    echo "<span class='badge badge-success p-2 rounded-pill'>Finished</span>";
                                                ?>
                                            </td>
                                            <td>
                                                <a href="editbooking.php?id=<?php echo $row['id']; ?>" alt="Edit"><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    <?php }   ?>
                                </tbody>
                                <tfoot>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Plate Number</th>
                                    <th>Destination</th>
                                    <th>Pickup Point</th>
                                    <th>Due Date</th>
                                    <th>Return Date</th>
                                    <th>Estimated Km</th>
                                    <th>Confirm Payment</th>
                                    <th>Confirm Trip</th>
                                    <th>Status Trip</th>
                                    <th>Action</th>
                                    </tfoot>
                            </table>
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

<script>
    $(document).ready(function() {
        $('#myTable').dataTable();
    });
</script>

</html>