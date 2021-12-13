<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="menu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li> -->
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="buslist.php" class="nav-link">Vehicles</a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['username']) == true) {?>
        <li class="nav-item dropdown">
            <a href="./logout.php" class="nav-link">
            <i class="fa fa-arrow-circle-o-right bg-dark"></i>Logout
            </a>
        </li>
        <li class="nav-item dropdown">
        <a href="./mybill.php" class="nav-link" >
            <i class="fa fa-user-circle"></i><?php echo $_SESSION['username'] ?>
        </a>
        </li>
        <?php } else { ?>
        <li class="nav-item dropdown">
            <a href="./login.php" class="nav-link">
                <i class="fa fa-sign-out" aria-hidden="true"></i>Login
            </a>
        </li>
        <?php }?>
    </ul>
</nav>