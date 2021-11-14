<?php
   $conn=mysqli_connect('localhost','root','','vehicle_management');
   $sql="SELECT * FROM bill ";
   $result=mysqli_query($conn,$sql);
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
   
?>


<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Welcome to Vehicle Management</title>   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
     <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./slick/slick.css">
    <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css"> 
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="style.css">




<body> 
 <?php include 'navbar_admin.php';?> 
 <br><br>
<div class="container">

<div class="row">
    <div class="page header">
        <h3 style="text-align: center;">Billing List</h3>

    </div>
    
    <table id="myTable" class="table table-bordered" >  

        <thead>
              <th>ID</th>
              <th >Total Cost</th>
              <th >Action</th>
        </thead>

        <tbody>
            <?php while($row=mysqli_fetch_assoc($result)){?>
              <tr>
                <td> <?php echo $row['id']?> </td>
                <td> <?php echo $row['tcost']?> </td>
                <td>
                  <a class="btn btn-info" href="showbill.php?id=<?php echo $row['id']; ?>">View</a>
				  <!--
                  <a class="btn btn-primary" href="editbill.php?id=<?php echo $row['id']; ?>">Edit</a>
				  -->
                  <a class="btn btn-danger" onclick="return confirm('Are u sure?')" href="deletebill.php?id=<?php echo $row['bill_id']; ?>">Delete</a>
                </td>
              </tr>
              <?php }?>
            </tbody>

          </table>

</div>

</div>
</body>  
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
</html>  