<?php
    session_start();
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

</head>


<body style="margin:80px auto">
<?php include 'navbar.php';?>  
<div class="container foo">
<div class="row header" style="text-align:center">
<h3>Permanent Bus Schedule</h3>
</div>



<table id="myTable" class="table table-bordered table-striped table-hover table-condensed" >  


<thead>  
          <tr>  
            <th>NO</th>  
            <th>PERIOD</th>  
            <th>FIRST</th>  
            <th>SECOND</th>  
            <th>THIRD</th>  
          </tr>  
        </thead>  
       <tbody>  
          <tr>  
            <td>01</td>  
            <td>1st JANUARY to 31st JANUARY</td>  
            <td>3-45</td>  
            <td>4-45</td>  
            <td>6-15</td>  
          </tr> 
          <tr>  
            <td>02</td>  
            <td>1st FEBRUARY to 28/29th FEBRUARY</td>  
            <td>4-00</td>  
            <td>5-00</td>  
            <td>6-30</td>  
          </tr> 
          <tr>  
            <td>03</td>  
            <td>1st MARCH to 31st MARCH</td>  
            <td>4-15</td>  
            <td>5-15</td>  
            <td>6-45</td>  
          </tr> 
          <tr>  
            <td>04</td>  
            <td>1st APRIL to 30th APRIL</td>  
            <td>4-30</td>  
            <td>5-30</td>  
            <td>7-00</td>  
          </tr> 
          <tr>  
            <td>05</td>  
            <td>1st MAY to 31st MAY</td>  
            <td>4-45</td>  
            <td>5-45</td>  
            <td>7-15</td>  
          </tr> 
          <tr>  
            <td>06</td>  
            <td>1st JUNE to 31st JULY</td>  
            <td>5-00</td>  
            <td>6-00</td>  
            <td>7-30</td>  
          </tr> 
          <tr>  
            <td>07</td>  
            <td>1st AUGUST to 15th AUGUST</td>  
            <td>5-00</td>  
            <td>6-00</td>  
            <td>7-15</td>   
          </tr> 
          <tr>  
            <td>08</td>  
            <td>16th AUGUST to 31st AUGUST</td>  
            <td>4-45</td>  
            <td>5-45</td>  
            <td>7-00</td>  
          </tr> 
          <tr>  
            <td>09</td>  
            <td>1st SEPTEMBER to 15th SEPTEMBER</td>  
            <td>4-30</td>  
            <td>5-30</td>  
            <td>6-45</td>  
          </tr> 
          <tr>  
            <td>10</td>  
            <td>16th SEPTEMBER to 30th SEPTEMBER</td>  
            <td>4-15</td>  
            <td>5-15</td>  
            <td>6-35</td>  
          </tr> 
          <tr>  
            <td>11</td>  
            <td>1st OCTOBOR to 15th OCTOBOR</td>  
            <td>4-00</td>  
            <td>5-00</td>  
            <td>6-15</td>  
          </tr> 
          <tr>  
            <td>12</td>  
            <td>16th OCTOBOR to 31st OCTOBOR</td>  
            <td>3-45</td>  
            <td>4-45</td>  
            <td>6-00</td> 
          </tr>  
          <tr>  
            <td>13</td>  
            <td>1st NOVEMBER to 31st DECEMBER</td>  
            <td>3-30</td>  
            <td>4-30</td>  
            <td>5-45</td> 
          </tr>  
        </tbody>  

</table>
	  </div>
	  
<script>
        window.sr = ScrollReveal();
        sr.reveal('.foo', { duration: 800 });
        
</script>
    
</body>  

</html>