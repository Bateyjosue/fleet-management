<?php
    session_start();
     $connection= mysqli_connect('localhost','root','','vehicle_management');

    $select_query="SELECT * FROM `tripcost`";
    $result= mysqli_query($connection,$select_query);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>trip Details</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
     <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./slick/slick.css">
    <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css"> 
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php include 'navbar_admin.php'; ?>
    <br><br>
    <div class="container">
        <div class="row">
             
            <div class="col-md-12">
                <div class="page-header">
                    <h1 style="text-align: center;">Trip Details</h1>
                 
                </div>
                
                <table id="myTable" class="table table-bordered animated rubberBand">
                    <thead>
                        <th>Booking Id</th>
                        <th>Total Km</th>
                        <th>Oil Cost</th>
                        <th>Extra Cost</th>
                        <th>Total Cost Cost</th>
                    </thead>
                    <tbody>
                        <?php while($row=mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td><?php echo $row['booking_id']; ?></td>
                            <td><?php echo $row['total_km']; ?></td>
                            <td><?php echo $row['oil_cost']; ?></td>
                            <td><?php echo $row['extra_cost']; ?></td>
                            <td><?php echo $row['total_cost']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
                
            </div>
     
        </div>
    </div>
</body>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
</html>