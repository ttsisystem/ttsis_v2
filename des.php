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
    <link rel="icon" href="img/logo1.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="newmeta.css">

<style type="text/css">
}

/* Center website */
.main {
}

h1 {
}

.row {
}

/* Add padding BETWEEN each column (if you want) */
.row,
.row > .column {
  padding: 8px;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  display: none; /* Hide columns by default */
}

/* Clear floats after rows */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Content */
.content {
  background-color: white;
  padding: 10px;
}

/* The "show" class is added to the filtered elements */
.show {
  display: block;
}

/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: white;
  cursor: pointer;
}

/* Add a grey background color on mouse-over */
.btn:hover {
  background-color: #ddd;
}

/* Add a dark background color to the active button */
.btn.active {
  background-color: #666;
   color: white;
}
</style>

<script type="text/javascript">
    filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";

  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
</head>

<body>

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
        <?php 
            include 'nav.php';
        ?>
    </header>
    <div class="container-fluid">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="">
                    <div class="row">
                        <video width="100%" height="" autoplay="true" controls>
                        <source src="tourism/assets/localpic/HAVE FUN IN DY ABRA, TUMAUINI.mp4" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'des_list.php' ; ?>

    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto" >
                <h1 class="h1">Where to Go</h1>
                <p>
                    Tourism Department | Tumauini | Isabela
                </p>
            </div>
        </div>
        <div class="row">
            <div class="container img-fluid " align="center">
                <a href="https://www.google.com/maps/place/Tumauini,+Isabela/data=!4m2!3m1!1s0x338569791cc368a7:0x936b3794b0b59d1e?sa=X&ved=2ahUKEwi11fOMi8bzAhWFdd4KHYYHA2sQ8gF6BAgUEAE" target="_blank"><img src="tourism/assets/localpic/localmap.png" style="width: 1080px;"></a>
            </div>
        </div>

    </section>


    <?php 
    include 'tourism/footer.php'; 
    ?>

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