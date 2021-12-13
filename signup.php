<?php
include 'server.php';
session_start();
$msg = "";

if (isset($_POST['submit'])) {
    $full_name = mysqli_real_escape_string($connection, strtolower($_POST['full_name']));
    $department = mysqli_real_escape_string($connection, strtolower($_POST['department']));
    $phone = mysqli_real_escape_string($connection, strtolower($_POST['phone']));
    $email = mysqli_real_escape_string($connection, strtolower($_POST['email']));
    $username = mysqli_real_escape_string($connection, strtolower($_POST['username']));
    $password = mysqli_real_escape_string($connection, strtolower($_POST['password']));

    $signup_query = "INSERT INTO `tbl_users`(`username`, `user_password`, `user_role`,`full_name`,`department`, `phone`,`email`) 
    VALUES ('$username','$password',0,'$full_name','$department','$phone','$email')";

    $check_query = "SELECT * FROM `tbl_users` WHERE username='$username' or email='$email'";

    $check_res = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($check_res) > 0) {
        $msg = '<div class="alert alert-warning" style="margin-top:30px";>
                    <strong>Failed!</strong> Username or Email already exists.
                    </div>';
    } else {
        $signup_res = mysqli_query($connection, $signup_query);
        $msg = '<div class="alert alert-success" style="margin-top:30px";>
                    <strong>Success!</strong> Registration Succefull.
                    </div>';
        header ('Location:index.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="swal/sweetalert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="swal/sweetalert.js"></script>
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="style.css">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <?php echo $msg; ?>
                <div class="page-header">
                    <h1 style="text-align: center;">Sign Up</h1>
                </div>
                <form class="form-horizontal animated bounce" action="" method="post">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="firstname" type="text" class="form-control" name="full_name" placeholder="Full Name">
                    </div>
                    <br>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-download"></i></span>
                        <select name="department" id="" style="width:515px; padding: 10px; ">
                            <option value="">BIT</option>
                            <option value="">Economy</option>
                            <option value="">Hospitality</option>
                            <option value="">Tourism</option>
                        </select>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                        <input id="lastname" type="text" class="form-control" name="phone" placeholder="Phone">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="username" type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <br>
                    <div class="input-group">
                        <button type="submit" name="submit" class="btn btn-success">Sign Up</button>
                    </div>
                </form>
                <div>
                    <a href="login.php">Sign in</a>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>