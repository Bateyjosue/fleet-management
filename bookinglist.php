<?php
    session_start();
     $connection= mysqli_connect('localhost','root','','vehicle_management');

    $select_query="SELECT * FROM `booking` ORDER BY booking_id DESC";
    $result= mysqli_query($connection,$select_query);
    

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking list</title>
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
                <h1 style="text-align: center;">Booking List</h1>
                 
              </div> 
              <table id="myTable" class="table table-bordered animated bounce">
                <thead>
                    
                    <th>Booking Id</th>
                    <th>Name</th>
                    <th>Type</th>
                    
                    <th>Delete</th>
                    <th>Release</th>
                    <th>Confirm Trip</th>
                    <th>Checked</th>
                    <th>Finished</th>
                    <th>Bill</th>
                    <th>Confirm Payment</th>
                    <th>Paid</th>
                    
                </thead>
                
                <tbody>
                    <?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <tr>
                       
                        <td><?php echo $row['booking_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                       
                        
                        <td><a class="btn btn-danger" href="deletebooking.php?id=<?php echo $row['booking_id']; ?>">Delete</a></td>
                        
                        <?php if($row['confirmation']==0 or $row['finished']==1)  { ?>
                        <td><a class="btn btn-default disabled" href="releasebooking.php?id=<?php echo $row['booking_id']; ?>">Release Vehicle</a></td>
                        <?php } else{ ?>
                        <td><a class="btn btn-default" href="releasebooking.php?id=<?php echo $row['booking_id']; ?>">Release Vehicle</a></td>
                        <?php } ?>
                        
                        <?php if($row['confirmation']=='0'){ ?>
                        <td><a class="btn btn-success" href="confirmbooking.php?id=<?php echo $row['booking_id']; ?>">Confirm</a></td>
                        <?php } else { ?>
                        <td><a class="btn btn-success disabled" href="confirmbooking.php?id=<?php echo $row['booking_id']; ?>">Confirm</a></td>
                        <?php } ?>
                        
                        <?php if($row['confirmation']=='0'){ ?>
                        <td>No</td>
                        <?php } else { ?>
                        <td>Yes</td>
                        <?php }  ?>
                        
                        <?php if($row['finished']=='0'){ ?>
                        <td>No</td>
                        <?php } else { ?>
                        <td>Yes</td>
                        <?php }  ?>
                        
                        
                        
                        <?php if($row['finished']=='1' and $row['paid']==0 ){  ?>
                        <td><a class="btn btn-primary" href="bill.php?id=<?php echo $row['booking_id']; ?>">Bill</a></td> 
                         <?php } else if($row['paid']==1 ) { ?>
                          <td><a class="btn btn-primary disabled" href="bill.php?id=<?php echo $row['booking_id']; ?>">Bill</a></td> 
                          <?php }  ?>
                          
                         
                          <td><a href="confirmpayment.php?id=<?php echo $row['booking_id']; ?>">Confirm</a></td>
                          
                          <?php if($row['paid']=='0'){ ?>
                        <td>No</td>
                        <?php } else { ?>
                        <td>Yes</td>
                        <?php }  ?>
                          
                          
                          
                        
                    </tr>
                    

                    <?php }   ?>
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