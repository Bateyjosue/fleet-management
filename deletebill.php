<?php
   
   $id= $_GET['id'];

   $connection=mysqli_connect("localhost","root","","fleet-management");
   $sql="DELETE FROM bill WHERE bill_id='$id'";
   $result=mysqli_query($conn,$sql);
   if(mysqli_query($conn,$sql)){
       header("Location: indexbill.php");
   }else{
         echo "Not deleted";
   }
   
?>
