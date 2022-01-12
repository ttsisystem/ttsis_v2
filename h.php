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
    <title>Tumauini Tourist Spot Info System &amp; Newspaper HTML Template</title>

    <!-- Favicon -->
    <link rel="icon"  href="img/logo1.png">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="newmeta.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
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
    <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
    <li data-target="#demo" data-slide-to="4"></li>
    <li data-target="#demo" data-slide-to="5"></li>
    <li data-target="#demo" data-slide-to="6"></li>
    <li data-target="#demo" data-slide-to="7"></li>
    <li data-target="#demo" data-slide-to="8"></li>
    <li data-target="#demo" data-slide-to="9"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner" >
    <div class="carousel-item active">
      <img src="tourism/images/1.jpg" alt="Los Angeles" style="width: 9999px; height: 700px; object-fit: cover;">
    </div>
    <div class="carousel-item ">
      <img src="tourism/images/2.jpg" alt="Los Angeles" style="width: 9999px; height: 700px; object-fit: cover;">
    </div>
    <div class="carousel-item ">
      <img src="tourism/images/3.jpg" alt="Los Angeles" style="width: 9999px; height: 700px; object-fit: cover;">
    </div>
    <div class="carousel-item ">
      <img src="tourism/images/4.jpg" alt="Los Angeles" style="width: 9999px; height: 700px; object-fit: cover;">
    </div>
    <div class="carousel-item ">
      <img src="tourism/images/5.jpg" alt="Los Angeles" style="width: 9999px; height: 700px; object-fit: cover;">
    </div>
    <div class="carousel-item ">
      <img src="tourism/images/6.jpg" alt="Los Angeles" style="width: 9999px; height: 700px; object-fit: cover;">
    </div>
    <div class="carousel-item ">
      <img src="tourism/images/7.jpg" alt="Los Angeles" style="width: 9999px; height: 700px; object-fit: cover;">
    </div>
    <div class="carousel-item ">
      <img src="tourism/images/8.jpg" alt="Los Angeles" style="width: 9999px; height: 700px; object-fit: cover;">
    </div>
    <div class="carousel-item ">
      <img src="tourism/images/9.jpg" alt="Los Angeles" style="width: 9999px; height: 700px; object-fit: cover;">
    </div>
    <div class="carousel-item ">
      <img src="tourism/images/10.jpg" alt="Los Angeles" style="width: 9999px; height: 700px; object-fit: cover;">
    </div>
    
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
</div>
    <section class="container-fluid py-5">
        <div class="row text-center pt-3 col-lg-12">
            <div class="col-md-3">
                <div class="card">
                    <h6 class="card-header" style="background-color: #2AF598;"><i class="fas fa-eye"></i> Page Visits</h6>
                    <div class="card-body" style="height: 148px">
                    <p style="font-size: 50px">
                    <?php 
                      $handle = fopen("counter.txt", "r");
                      if(!$handle){ echo "could not open the file" ; 
                        } 
                        else {
                        $counter = ( int ) fread ($handle,20) ;
                        fclose ($handle) ;
                        $counter++ ;
                        echo $counter ;
                        $handle = fopen("counter.txt", "w" ) ;
                        fwrite($handle,$counter) ;
                        fclose ($handle) ;
                      }
                    ?>
                    </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <h6 class="card-header" style="background-color: #2AF598;"><i class="fas fa-users"></i> Registered Users</h6>
                    <div class="card-body" style="height: 148px">
                    <?php
                    $sql = "SELECT id from tblusers";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=$query->rowCount();
                    ?>
                    <p style="font-size: 50px" value=""><?php echo htmlentities($cnt);?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <h6 class="card-header" style="background-color: #2AF598;"><i class="fas fa-book"></i> Bookings</h6>
                    <div class="card-body" style="height: 148px;">
                    <?php
                    $sql1 = "SELECT BookingId from tblbooking";
                    $query1 = $dbh -> prepare($sql1);
                    $query1->execute();
                    $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                    $cnt1=$query1->rowCount();
                    ?>
                    <p style="font-size: 50px;"> <?php echo htmlentities($cnt1);?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <h6 class="card-header" style="background-color: #2AF598;"><i class="fas fa-star-half-alt"></i> Total Ratings</h6>
                    <div class="card-body">
                        <center>
                            <div id="avgrating"></div>

                                <?php 
                                $sql = "SELECT avg (rating) as avg from feedback";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0){
                                foreach($results as $result)
                                {
                                ?>
                                <p style="font-family: fantasy; font-size: 30px; color: #EDA800;"><?php echo round(htmlentities($result->avg),1) ; } }?></p>
                        </center>
                            
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="hero-area">
        <!-- Hero Post Slides -->
        <div class="hero-post-slides owl-carousel">
            <!-- Single Slide -->
            <div class="single-slide">
                <div class="">
                    <div class="row">
                        <div class="col-12">
                            <div class="single-blog-post style-1 mb-30" data-animation="fadeInUpBig" data-delay="300ms" data-duration="1000ms">
                                                    <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail bg-overlay">
                                    <a href="#"><img style="min-width: 100%; max-height: 700px" src="https://z-p3-scontent.fcrk2-1.fna.fbcdn.net/v/t1.15752-9/263653509_589731258773626_1389215967222179233_n.jpg?_nc_cat=104&ccb=1-5&_nc_sid=ae9488&_nc_eui2=AeGrftB_Rje7L-zxhkW2XTbv4t__FWn0zhzi3_8VafTOHCEmar1Xpn4KZvyBMDU1iYI0-GDC_prrdEA-ga2mFRoO&_nc_ohc=BGQnQRlibJkAX_o2pyl&_nc_ht=z-p3-scontent.fcrk2-1.fna&oh=03_AVLWKh7BoFBLWLyoSfWSokXVaRqQfskvx1DZeOGIgGSM8w&oe=61E252EE" alt=""></a>
                                </div>

                                <div class="blog-content">
                                    <center>
                                    <span class="post-date" style="font-size: 20px; font-family: cursive;">Featured Most Visited</span>
                                    <a href="stmathias.php" class="post-title" style="font-size: 75px; font-family: cursive;">Church of St. Matthias<br></a>
                                    <p class="text-light" style="font-size: 25px; font-family: cursive;">Maharlika Highway, Tumauini, 3325 Isabela</p>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<br>
<?php include 'tourism/footer.php';

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="js/active.js"></script>
        <script type="text/javascript">
        $(function () {
          $("#avgrating").rateYo({
            readOnly:true,
            rating:'<?php 
            $sql = "SELECT avg (rating) as avg from feedback";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0){
            foreach($results as $result)
            {
                 echo htmlentities($result->avg);
             } } ?>'
          });
        });
    </script>
</body>

</html>