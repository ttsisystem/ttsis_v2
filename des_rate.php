<?php
session_start();
error_reporting(0);
    include 'includes/conn.php';

    if(isset($_POST['rating'])) {
        $desname = $_GET['desname'];
        $email = $_POST['email'];
        $rating = $_POST['rating'];
        $feedback = $_POST['feedback'];
        $feedimage = $_FILES["feedimage"]["name"];
        move_uploaded_file($_FILES["feedimage"]["tmp_name"],"admin/comment_img/".$_FILES["feedimage"]["name"]);
        $sql="INSERT INTO  feedback(destination,rating,feedback,email,image) VALUES(:desname,:rating,:feedback,:email,:feedimage)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':desname',$desname,PDO::PARAM_STR);
        $query->bindParam(':rating',$rating,PDO::PARAM_STR);
        $query->bindParam(':feedback',$feedback,PDO::PARAM_STR);
        $query->bindParam(':email',$email,PDO::PARAM_STR);
        $query->bindParam(':feedimage',$feedimage,PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId){
        $sql99="INSERT INTO  admin_notif (Subject) VALUES('New rating has been added!')";
        $query99 = $dbh->prepare($sql99);
        $query99->execute();
        $msg = "<div class='alert alert-success'>Rating Successfully Added</div>";
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Tumauini Tourist Spot Informatio System | Ratings</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <link rel="icon" href="img/core-img/favicon.png">

    <link rel="stylesheet" href="newmeta.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

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
    <header class="header-area">
        <!-- Navbar Area -->
        <?php 
        include 'nav.php';
        ?>
    </header>
    <h1></h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <br>
                <br>
                <?php 
$desname=$_GET['desname'];
$sql = "SELECT * from tbltourpackages where PackageName=:desname";
$query = $dbh->prepare($sql);
$query->bindParam(':desname',$desname,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
?>
                <a href="view_destination.php?desid=<?php echo htmlentities($result->PackageId);?>&desname=<?php echo htmlentities($result->PackageName);?>"><i style=" font-size: 20px;" class="text-success fas fa-arrow-left"> Back</i></a>
                <hr>    
                <h1>Rate/Review Your Visit in </h1>
                <h2 class="text-success"><?php echo htmlentities($result->PackageName);?></h2>
<?php } } ?>
                <?php if(isset($msg)){ echo $msg; } ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Select Star:</label>
                        <div id="rateYo"></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="feedback">Feedback:</label>
                        <input type="text" class="form-control" name="feedback">
                        <input type="hidden" name="rating" id="rating">
                    </div>
                    <div class="form-group">
                        <label class="feedback">Upload Image:</label>
                        <div>
                            <input type="file" name="feedimage" id="image" required>
                        </div>
                    </div>


                    <?php
                        if($_SESSION['login']) {
                    ?>
                    <button class="btn btn-success">Submit</button>
                    <?php 
                        }
                        else {
                    ?>
                    <div>
                        <i class="text-danger fas fa-exclamation-circle">You need to have an account to be able to comment!</i>
                    </div>
                    <a href="reg/signin.php"><i class="btn btn-success" >Submit</i></a>
                    <?php   } ?>
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h3 align="center">Average Review/Rating</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <center>
                    <div id="avgrating"></div>
                </center>
            </div>
        </div>
            <hr>
            <br>
            <h2 class="text-success">User Feedbacks</h2>
            <?php 
            $desname = $_GET['desname'];
            $sql = "SELECT * from feedback WHERE destination=:desname ORDER BY id DESC";
            $query = $dbh->prepare($sql);
            $query->bindParam(':desname',$desname,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {
            ?>
            <hr>
            <div class="media">
                    <img src="data:image/png;base64,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" class="media-object" style="width:50px" class="align-self-end mr-3">&nbsp;&nbsp;
                <div class="media-body">
                    <div class="media-heading">
                        <div class="rateYo-<?php echo htmlentities($result->id);?>"></div>
                    </div>
                    <script type="text/javascript">
                        $(function () {
                     
                        $(".rateYo-<?php echo htmlentities($result->id); ?>").rateYo({
                            readOnly:true,
                            rating:<?php echo htmlentities($result->rating);?>,
                        });
                     
                    });
                    </script>
                    <p><?php echo htmlentities($result->feedback);?></p>
                    <p style="font-family: sans-serif; color: black;">by: <?php echo htmlentities($result->email);?></p>
                    <p class="text-success"><?php echo htmlentities($result->creationdate);?></p>
                </div>
                &nbsp;
                <div>
                    <a href="admin/comment_img/<?php echo htmlentities($result->image);?>" class="fancybox" data-fancybox="gallery11">
                        <img src="admin/comment_img/<?php echo htmlentities($result->image);?>" width="200" height="200">

                    </a>
                </div>
              </div>
              <hr>
            <?php 
                } 
            } 
            ?>
    </div>
    <br>
    <?php include 'tourism/footer.php'; ?>

    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script type="text/javascript">
        $(function () {
     
          $("#rateYo").rateYo({
            fullStar: true,
            onSet: function (rating, rateYoInstance) {
                $("#rating").val(rating);
            }
          });

          $("#avgrating").rateYo({
            readOnly:true,
            rating:'<?php 
            $desname = $_GET['desname'];
            $sql = "SELECT avg (rating) as avg from feedback Where destination=:desname";
            $query = $dbh->prepare($sql);
            $query->bindParam(':desname',$desname,PDO::PARAM_STR);
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