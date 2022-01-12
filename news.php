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
    <link rel="icon" href="img/core-img/favicon.png">

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
    filterSelection("all") // Execute the function and show all columns
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
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

// Hide elements that are not selected
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

// Add active class to the current button (highlight it)
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
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breaking News Area Start ##### -->
<!--     <section class="breaking-news-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="breaking-news-ticker d-flex flex-wrap align-items-center">
                        <div class="title">
                            <h6>Trending</h6>
                        </div>
                        <div id="breakingNewsTicker" class="ticker">
                            <ul>
                                <li><a href="#" target="_blank">Wala pang trending excited.</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <div class="hero-area">
        <!-- Hero Post Slides -->
        <div class="hero-post-slides owl-carousel">

            <!-- Single Slide -->
            <div class="single-slide">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <h2>Events</h2>
                        </div>
                        <div class="col-12 col-md-4">
                            <h2>News</h2>
                        </div>
                    </div>
                    <div class="row">             


                        <div class="col-12 col-md-8">
 <?php 
$sql = "SELECT * from tblnewsevents where type='Events' order by 'id' desc";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
?> 
                            <div class="single-blog-post style-1 mb-30" data-animation="fadeInUpBig" data-delay="100ms" data-duration="1000ms">
                                <div class="blog-thumbnail bg-overlay">
                                    <a href="#"><img style="object-fit: cover; height: 500PX" src="admin/newsevents_img/<?php echo htmlentities($result->image); ?>" alt=""></a>
                                </div>
                                <div class="blog-content bg-overlay">
                                    <span class="post-date"><?php echo htmlentities($result->creationdate); ?></span>
                                    <a href="viewevent.php?id=<?php echo htmlentities($result->id); ?>&title=<?php echo htmlentities($result->title); ?>" class="post-title"><?php echo htmlentities($result->title); ?><br></a>
                                    <i class="text-light"><?php echo htmlentities($result->tag); ?></i>
                                </div>
                            </div>
                        <?php }} ?>
                        </div>
                        <div class="col-12 col-md-4">
<?php
$sql = "SELECT * from tblnewsevents where type='News' order by 'id' desc";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
?> 

                            <div class="single-blog-post style-1 mb-30" data-animation="fadeInUpBig" data-delay="500ms" data-duration="1000ms">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail bg-overlay">
                                    <a href="viewnews.php?id"><img style="object-fit: cover0; width: 100%; height: 250PX;" src="admin/newsevents_img/<?php echo htmlentities($result->image); ?>" alt=""></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date"><?php echo htmlentities($result->creationdate); ?></span>
                                    <a href="viewnews.php?id=<?php echo htmlentities($result->id); ?>&title=<?php echo htmlentities($result->title); ?>" class="post-title"><?php echo htmlentities($result->title); ?><br></a>
                                    <i class="text-light"><?php echo htmlentities($result->tag); ?></i>
                                </div>
                            </div>                                            
<?php } }?>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
    <?php include 'des_list.php'; ?>

<br>
<br>
<br>
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