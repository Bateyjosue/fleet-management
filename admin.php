<?php
include 'server.php';
$sql1 = "SELECT * FROM vihicle";
$res1 = mysqli_query($connection, $sql1);
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fleet System 3 | Dashboard</title>

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
    <!-- Ion Icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

        <!-- Navbar -->
        <?php include 'navbar_admin.php' ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?PHP include('sidebar.php') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-4 col-5">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $sql = "SELECT COUNT(*) as count FROM `tbl_users`;";
                                        $res = mysqli_query($connection, $sql);
                                        $data = mysqli_fetch_assoc($res);
                                        echo $data['count'];
                                        ?>
                                        <!-- <h3><sup style="font-size: 20px">%</sup> -->
                                    </h3>

                                    <p>Users</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-6">
                            <!-- small box -->
                            <div class="small-box bg-dark">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $sql = "SELECT COUNT(*) as count FROM `tbl_driver`;";
                                        $res = mysqli_query($connection, $sql);
                                        $data = mysqli_fetch_assoc($res);
                                        echo $data['count'];
                                        ?>
                                        <!-- <h3><sup style="font-size: 20px">%</sup> -->
                                    </h3>

                                    <p>Divers</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-2 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $sql = "SELECT COUNT(*) as count FROM `tbl_vehicles`;";
                                        $res = mysqli_query($connection, $sql);
                                        $data = mysqli_fetch_assoc($res);
                                        echo $data['count'];
                                        ?>
                                        <!-- <h3><sup style="font-size: 20px">%</sup> -->
                                    </h3>
                                    <p>Vehicles</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-cards"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $sql = "SELECT COUNT(*) as count FROM `tbl_book_trip`;";
                                        $res = mysqli_query($connection, $sql);
                                        $data = mysqli_fetch_assoc($res);
                                        echo $data['count'];
                                        ?>
                                        <!-- <h3><sup style="font-size: 20px">%</sup> -->
                                    </h3>

                                    <p>Booking</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-12 connectedSortable">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Users Information</h3>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table teble-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Username </th>
                                                <th>Password </th>
                                                <th>User Role</th>
                                                <th>User Full-Name</th>
                                                <th>User Department</th>
                                                <th>User Email</th>
                                                <th>User Phone</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?PHP
                                            #$conn = mysqli_connect("begl9q2aqo2yag9pw4jb-mysql.services.clever-cloud.com", "ubeptibrepcuncym", "NGuqOFbgyHyLwhJC67JL", "begl9q2aqo2yag9pw4jb");
                                            $sql = "SELECT * FROM tbl_users ";
                                            $result = mysqli_query($connection, $sql);
                                            while ($row = MYSQLI_FETCH_ASSOC($result)) { ?>
                                                <tr>
                                                    <td><?PHP echo $row['id']; ?> <a href=""><i class="fa fa-edit ml-2 fs-6"></i></a></td>
                                                    <td><?PHP echo $row['username']; ?></td>
                                                    <td><?PHP echo substr(password_hash($row['user_password'], PASSWORD_DEFAULT), -12); ?></td>
                                                    <td><?PHP echo $row['user_role']; ?></td>
                                                    <td><?PHP echo $row['full_name']; ?></td>
                                                    <td><?PHP echo $row['department']; ?></td>
                                                    <td><?PHP echo $row['email']; ?></td>
                                                    <td><?PHP echo $row['phone']; ?></td>
                                                    <td><?PHP
                                                        if ($row['status'] == 1)
                                                            echo '<span class="badge badge-success p-2 rounded-pill">Active</span>';
                                                        else {
                                                            echo '<span class="badge badge-danger p-2 rounded-pill">Not Activate</span>';
                                                        }

                                                        ?></td>
                                                </tr>
                                            <?PHP } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Username </th>
                                                <th>Password </th>
                                                <th>User Role</th>
                                                <th>User Full-Name</th>
                                                <th>User Department</th>
                                                <th>User Email</th>
                                                <th>User Phone</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Drivers</h3>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table teble-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Driver ID</th>
                                                <th>Vehicle ID</th>
                                                <th>National ID</th>
                                                <th>Driving License</th>
                                                <th>License Validity</th>
                                                <th>Full Name</th>
                                                <th>Photo</th>
                                                <th>Driver email</th>
                                                <th>Driver Address</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?PHP
                                            $sql = "SELECT * FROM tbl_driver ";
                                            $result = mysqli_query($connection, $sql);
                                            while ($row = MYSQLI_FETCH_ASSOC($result)) { ?>
                                                <tr>
                                                    <td><?PHP echo $row['id']; ?><a href="editdriver.php?id=<?php echo $row['id'] ?>"><i class="fa fa-edit ml-2" aria-hidden="true"></i></a></td>
                                                    <td><?PHP echo $row['vehicle_id']; ?></td>
                                                    <td><?PHP echo $row['national_ID']; ?></td>
                                                    <td><?PHP echo $row['driving_license']; ?></td>
                                                    <td><?PHP echo $row['license_validity']; ?></td>
                                                    <td><?PHP echo $row['full_name']; ?></td>
                                                    <td><?PHP echo $row['photo']; ?></td>
                                                    <td><?PHP echo $row['email']; ?></td>
                                                    <td><?PHP echo $row['address']; ?></td>
                                                    <td><?PHP
                                                        if ($row['status'] == 1)
                                                            echo '<span class="badge badge-success p-2 rounded-pill">Available</span>';
                                                        else {
                                                            echo '<span class="badge badge-danger p-2 rounded-pill">Not Available</span>';
                                                        }

                                                        ?></td>
                                                </tr>
                                            <?PHP } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Driver ID</th>
                                                <th>Vehicle ID</th>
                                                <th>National ID</th>
                                                <th>Driving License</th>
                                                <th>License Validity</th>
                                                <th>Full Name</th>
                                                <th>Photo</th>
                                                <th>Driver email</th>
                                                <th>Driver Address</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Vehicles</h3>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table teble-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Vehicle PlatNumber</th>
                                                <th>Vehicle Type</th>
                                                <th>Vehicle Chassis Number</th>
                                                <th>Vehicle Brand</th>
                                                <th>Vehicle Description</th>
                                                <th>Vehicle Availability</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?PHP
                                            $sql1 = "SELECT * FROM tbl_vehicles";
                                            $res1 = mysqli_query($connection, $sql1);
                                            while ($row = MYSQLI_FETCH_ASSOC($res1)) { ?>
                                                <tr>
                                                    <td><a href="editvehicle.php?plate=<?php echo $row['plate_number'] ?>"><i class="fa fa-edit mr-2" aria-hidden="true"></i></a><?PHP echo strtoupper($row['plate_number']); ?></td>
                                                    <td><?PHP echo $row['vehicle_type']; ?></td>
                                                    <td><?PHP echo $row['chasis_number']; ?></td>
                                                    <td><?PHP echo $row['brand']; ?></td>
                                                    <td><?PHP echo $row['vehicle_description']; ?></td>
                                                    <td><?PHP
                                                        if ($row['status'] == 1)
                                                            echo '<span class="badge badge-success p-2 rounded-pill">Available</span>';
                                                        else {
                                                            echo '<span class="badge badge-danger p-2 rounded-pill">Not Available</span>';
                                                        }
                                                        ?></td>
                                                </tr>
                                            <?PHP } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Vehicle PlatNumber</th>
                                                <th>Vehicle Type</th>
                                                <th>Vehicle Chassis Number</th>
                                                <th>Vehicle Brand</th>
                                                <th>Vehicle Description</th>
                                                <th>Vehicle Availability</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Booking Information</h3>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table teble-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Plate Number</th>
                                                <th>User ID</th>
                                                <th>Destination </th>
                                                <th>Pickup Point</th>
                                                <th>Request Date</th>
                                                <th>Return Date</th>
                                                <th>Reason</th>
                                                <th>Confirmation</th>
                                                <th>Trip Status</th>
                                                <th>Paid</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?PHP
                                            #$conn = mysqli_connect("begl9q2aqo2yag9pw4jb-mysql.services.clever-cloud.com", "ubeptibrepcuncym", "NGuqOFbgyHyLwhJC67JL", "begl9q2aqo2yag9pw4jb");
                                            $sql = "SELECT * FROM tbl_book_trip ";
                                            $result = mysqli_query($connection, $sql);
                                            while ($row = MYSQLI_FETCH_ASSOC($result)) { ?>
                                                <tr>
                                                    <td><?PHP echo $row['id']; ?></td>
                                                    <td><?PHP echo $row['vehicle_id']; ?></td>
                                                    <td><?PHP echo $row['user_id']; ?></td>
                                                    <td><?PHP echo $row['destination']; ?></td>
                                                    <td><?PHP echo $row['pickup_point']; ?></td>
                                                    <td><?PHP echo substr($row['created_at'], 0, 10); ?></td>
                                                    <td><?PHP echo $row['return_date']; ?></td>
                                                    <td><?PHP echo $row['resons']; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row['confirm_trip'] == 1)
                                                            echo '<span class="badge badge-success p-2 rounded-pill">Confirmed</span>';
                                                        else
                                                            echo '<span class="badge badge-warning p-2 rounded-pill">Not Confirmed</span>';
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row['status'] == 1)
                                                            echo '<span class="badge badge-info p-2 rounded-pill">Pending</span>';
                                                        else
                                                            echo '<span class="badge badge-warning p-2 rounded-pill">Finished</span>';
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row['paid'] == 1)
                                                            echo '<span class="badge badge-success p-2 rounded-pill">Paid</span>';
                                                        else
                                                            echo '<span class="badge badge-warning p-2 rounded-pill">Not Paid</span>';
                                                        ?>
                                                    </td>

                                                </tr>
                                            <?PHP } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Plate Number</th>
                                                <th>User ID</th>
                                                <th>Destination </th>
                                                <th>Pickup Point</th>
                                                <th>Request Date</th>
                                                <th>Return Date</th>
                                                <th>Reason</th>
                                                <th>Confirmation</th>
                                                <th>Trip Status</th>
                                                <th>Paid</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>


                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                </aside>
                <!-- /.control-sidebar -->
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; 2021-2022 <a href="">Fleet System</a>.</strong>
            Developed by NSENGIYUNVA Diane
            <div class="float-right d-none d-sm-inline-block">
            </div>
        </footer>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="./plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <!-- <script src="./plugins/jquery-ui/jquery-ui.min.js"></script> -->
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
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
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
</body>

</html>