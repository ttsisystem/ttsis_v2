<?php
session_start();
error_reporting(0);
include('includes/conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Tumauini Eco Tourist Spot Information System</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="newmeta.css">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <?php include 'nav.php' ?>
    </header>
<br>

<div class="container-fluid">
    <div class="col-12">
        <div class="row col-lg-12 justify-content-center" >
            <h2>Mission</h2>
        </div>
            <br>
            <div class="row col-lg-12">
            <p class="" style="color: black; text-align: center;">TO MAKE THE TOWN BEING 
THE TOURISM CAPITAL IN THE PROVINCE OF ISABELA, THROUGH ENHANCING AND INNOVATING THE TOURISM INDUSTRY CREATING A HIGHER RATE OF EMPLOYMENT ESPECIALLY FOR THE PEOPLE OF TUMAUINI.</p>
</div>
        </div>
        <br>
        <br>
    <div class="col-12">
        <div class="row col-lg-12 justify-content-center" >
            <h2>Vision</h2>
        </div>
            <br>
            <div class="row col-lg-12">
            <p class="" style="color: black; text-align: center;">            <p class="" style="color: black; text-align: center;">TO BE THE BEST HUMAN AND ENVIRONMENT FRIENDLY MUNICIPALITY THAT UPLIFT LIFE AND. PROMOTES SUSTAINABLE TOURISM AT THE HEART OF CAGAYAN VALLEY REGION.</p>
</p>
</div>
        </div>
    </div>
</div>

<?php include 'tourism/footer.php'; ?>
        <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>