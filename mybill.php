<?php
if (!isset($_SESSION)) {

    session_start();
}

$username = $_SESSION['username'];
include 'server.php';
//echo $username;
$sql  = "SELECT * FROM tbl_users WHERE username = '$username'";
$res = mysqli_query($connection, $sql);
$rw = mysqli_fetch_assoc($res);
$id = $rw['id'];

$query = "SELECT * FROM tbl_book_trip WHERE user_id = $id";
$result = mysqli_query($connection, $query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bill</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
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
    <div class="wrapper">
        <?php include 'navbar.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">My Bill Information</h1>
                        </div>
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

                                    <tr>
                                        <th>#</th>
                                        <th>Plate Number</th>
                                        <th>User ID</th>
                                        <th>Destination </th>
                                        <th>Pickup Point</th>
                                        <th>Request Date</th>
                                        <th>Return Date</th>
                                        <th>Total Cost</th>
                                        <th>Trip Confirmation</th>
                                        <th>Trip Status</th>
                                        <th>Paid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP
                                    while ($row = MYSQLI_FETCH_ASSOC($result)) {
                                        if($row){
                                        ?>
                                        <tr>
                                            <td><?PHP echo $row['id']; ?></td>
                                            <td><?PHP echo $row['vehicle_id']; ?></td>
                                            <td><?PHP echo $row['user_id']; ?></td>
                                            <td><?PHP echo $row['destination']; ?></td>
                                            <td><?PHP echo $row['pickup_point']; ?></td>
                                            <td><?PHP echo $row['created_at']; ?></td>
                                            <td><?PHP echo $row['return_date']; ?></td>
                                            <td>
                                                <?PHP echo ($row['estimated_km'] * $row['cost_km']) + $row['extra_cost']; ?>
                                            </td>
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
                                                    echo '<span class="badge badge-warning p-2 rounded-pill">Not Finished</span>';
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
                                    <?PHP 
                                        }else{
                                            echo '<td colspan="11" class="text-center"><span class="badge badge-"> NOT DATA FOUND AT THE MOMENT</spam></td>';
                                        }
                                    }
                                    ?>
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
                                        <th>Total Cost</th>
                                        <th>Trip Confirmation</th>
                                        <th>Trip Status</th>
                                        <th>Paid</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>

</body>

</html>