<?php
$connection = mysqli_connect("begl9q2aqo2yag9pw4jb-mysql.services.clever-cloud.com", "ubeptibrepcuncym", "NGuqOFbgyHyLwhJC67JL", "begl9q2aqo2yag9pw4jb");

session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>vehicle management system</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./slick/slick.css">
  <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="animate.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">




</head>
<style>
  .parallax {
    /* The image used */
    background-image: url("bus-people-public-transportation-34171.jpg");
    height: 100%;

    /* Set a specific height */
    min-height: 700px;

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;

  }

  .parallax1 {
    /* The image used */
    background-image: url("pexels-photo-280310 .jpeg");
    height: 100%;

    /* Set a specific height */
    min-height: 600px;

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;

  }

  .navbar-fixed-top.scrolled {
    background-color: ghostwhite;
    transition: background-color 200ms linear;
  }
  nav a{
    color: white;
    text-transform: uppercase;
    font-size:14px;
  }
  nav a i{
    font-size:19px;
    /* margin-top: 15px !important; */
    padding-top: -5px !important;
    margin-right: 10px;
  }
  nav a:hover{
    text-decoration: none;
    border-bottom: 3px solid white;
    border-top: 3px solid white;
    /* border-radius: 0% 100% 100% 100%; */
  }
</style>

<body data-spy="scroll" data-target=".navbar" data-offset="50" onload="myFunction()">
  <div class="parallax foo">
  <nav class="navbar" style="background: rgb(0,0,0,.5) !important; display: flex; line-height:50px; ">
    <!-- Left navbar links -->
    <ul class="navbar-nav" style="flex: 1; list-style-type: none; " >
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="menu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li> -->
        <li class="nav-item d-none d-sm-inline-block" style="margin-right: 25px;">
            <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="buslist.php" class="nav-link">Vehicles</a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" style="margin-right:30px; list-style-type: none;">
        <?php if (isset($_SESSION['username']) == true) {?>
        <li class="nav-item dropdown" style="margin-right: 25px;">
            <a href="./logout.php" class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-sign-out" aria-hidden="true"></i>Logout
            </a>
        </li>
        <li class="nav-item dropdown">
        <a href="./mybill.php" class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-user-circle pt-1 mr-1" style=""></i><?php echo $_SESSION['username']; ?>
        </a>
        </li>
        <?php } else { ?>
        <li class="nav-item dropdown" style="margin-right: 25px;">
            <a href="./logout.php" class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-sign-out" aria-hidden="true"></i>Login
            </a>
        </li>
        <?php }?>
    </ul>
</nav>

    <div class="hero-text" style="font-size:50px; text-align: center; position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">

      <h1 class="animated rubberBand">Fleet Management System</h1>
      <p>A management system where you can easily manage vehicles</p>

      <?php if (isset($_SESSION['username']) == true) { ?>
        <a class="btn btn-success" style="text-align: center" href="buslist.php">Book a Vehicle</a>

      <?php } else {  ?>
        <a class="btn btn-success" style="text-align: center" href="login.php">Login To Book A Vehicle</a>
      <?php } ?>

    </div>
  </div>

  <div>
    <br><br>
    <div id="bus_route" class="container">
      <div class="page-header">
        <h1 style="text-align: center">Bus Route</h1>
      </div>
      <div class="row">
        <div class="col-md-6 foo">
          <p><b>The ruet bus goes around the rajshahi city in different interval. this is the route of the ruet bus.</b></p>
          <img src="pexels-photo-136739.jpeg" class="img-responsive">
        </div>
        <div class="col-md-6">
          <br>
          <iframe src="https://maps.google.com/maps?q=rwanda&t=k&z=7&ie=UTF8&iwloc=&output=embed" width="500" height="350" frameborder="0" style="border:0" allowfullscreen>
          </iframe>
          <p>The Bus Route</p>
        </div>
      </div>
    </div>

    <br>
    <div class="page-header">
      <h1 style="text-align: center">Driver</h1>
    </div>
    <div class="parallax1"></div>
    <div id="driver" class="container">

      <div class="row">
        <div class="col-md-12">
          <p style="font-size: 20px;">The driver of ruet are very punctual and they provides great service. Every one of them is professional and great at their jobs</p>

        </div>
      </div>

    </div>


    <div id="bus" class="container">
      <div class="page-header">
        <h1 style="text-align: center">Bus </h1>
      </div>
      <div class="row">
        <div class="col-md-6">

          <img src="pexels-photo-385998.jpeg" class="img-responsive">
        </div>
        <div class="col-md-6 foo1">
          <p style="font-size:20px;"><b>In Ruet we have around ten buses and each one of it is well maintained. These buses goes in different direction of the city and can also be hired.</b></p>
        </div>

      </div>
    </div>



    <p></p>

  </div>

  <footer style="background-color: #2f2f2f;
          color: #fff; padding-top: 70px;
          padding-bottom: 70px;" class="container-fluid text-center">
    <p>All rights reserved by IAF</p>
  </footer>







  <script>
    $(function() {
      $(document).scroll(function() {
        var $nav = $(".navbar-fixed-top");
        $a = $(".parallax");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $a.height());
      });
    });
  </script>


  <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
  <script>
    window.sr = ScrollReveal();
    sr.reveal('.foo', {
      duration: 800
    });
    sr.reveal('.foo1', {
      duration: 800,
      origin: 'top'
    });
  </script>

</body>

</html>