<?php
session_start();
error_reporting(0);
include('includes/conn.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
$hid=intval($_GET['hid']);	
if(isset($_POST['submit']))
{
$hotname=$_POST['hotname'];
$hotlocation=$_POST['hotlocation'];
$hotemail=$_POST['hotemail']; 
$hotcontact=$_POST['hotcontact'];
$hotdes=$_POST['hotdes'];
$map=$_POST['map'];	
$pimage=$_FILES["hotimage"]["name"];
$sql="update hotel set hotelname=:hotname,hotellocation=:hotlocation,email=:hotemail,hotelnumber=:hotcontact,hotdescription=:hotdes,map=:map where hotelid=:hid";
$query = $dbh->prepare($sql);
$query->bindParam(':hotname',$hotname,PDO::PARAM_STR);
$query->bindParam(':hotlocation',$hotlocation,PDO::PARAM_STR);
$query->bindParam(':hotemail',$hotemail,PDO::PARAM_STR);
$query->bindParam(':hotcontact',$hotcontact,PDO::PARAM_STR);
$query->bindParam(':map',$map,PDO::PARAM_STR);
$query->bindParam(':hotdes',$hotdes,PDO::PARAM_STR);
$query->bindParam(':hid',$hid,PDO::PARAM_STR);
$query->execute();
$msg=" Hotel Updated Successfully";
}
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Admin | Dashboard</title>
    <style type="text/css">
          <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
    </style>

</head>
<body>
        <div class="dashboard-main-wrapper">
<?php 
    include 'navbar.php';
    include 'sidebar.php';
?>
            <div class="dashboard-wrapper">
                <div class="dashboard-ecommerce">
                    <div class="container-fluid dashboard-content ">
                    	<div class="row">
                    		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header">
                                    <h2 class="pageheader-title">Tumauini Tourist Spot Information System</h2>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item" aria-current="page">Products</li>
                                                <li class="breadcrumb-item active" aria-current="page">Update Hotel</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                    	</div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="card bg-light">
                                    <h5 class="card-header">Updaten Products</h5>
                                    <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                                    else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                    <div class="card-body">

									<?php 
									$pid=intval($_GET['hid']);
									$sql = "SELECT * from hotel where hotelid=:pid";
									$query = $dbh -> prepare($sql);
									$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									$cnt=1;
									if($query->rowCount() > 0)
									{
									foreach($results as $result)
									{
										?>

                                        <form name="package" method="post" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-3 col-lg-2 col-form-label text-right">Hotel Name:</label>
                                                <div class="col-9 col-lg-10">
                                                    <input id="" name="hotname" type="text" required=""placeholder="" class="form-control" value="<?php echo htmlentities($result->hotelname);?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-lg-2 col-form-label text-right">Hotel Location:</label>
                                                <div class="col-9 col-lg-10">
                                                    <input id="" name="hotlocation" type="text" required=""placeholder="" class="form-control" value="<?php echo htmlentities($result->hotellocation);?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-lg-2 col-form-label text-right">Hotel Email Address:</label>
                                                <div class="col-9 col-lg-10">
                                                    <input id="" name="hotemail" type="text" required=""placeholder="" class="form-control" value="<?php echo htmlentities($result->email);?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-lg-2 col-form-label text-right">Contact Number:</label>
                                                <div class="col-9 col-lg-10">
                                                    <input id="" name="hotcontact" type="text" required=""placeholder="" class="form-control" value="<?php echo htmlentities($result->hotelnumber);?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-lg-2 col-form-label text-right">Hotel Description:</label>
                                                    <div class="col-9 col-lg-10">
                                                        <textarea class="form-control" rows="5" cols="50" name="hotdes" id="details" placeholder="Enter Hotel Description"><?php echo htmlentities($result->hotdescription);?></textarea> 
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-lg-2 col-form-label text-right">Hotel map:</label>
                                                    <div class="col-9 col-lg-10">
                                                        <textarea class="form-control" rows="5" cols="50" name="map" id="details" placeholder="Hotel Embeded Map "><?php echo htmlentities($result->map);?></textarea> 
                                                    </div>
                                            </div>
                                            <div class="form-group row">
												<label class="col-3 col-lg-2 col-form-label text-right">Hotel Image</label>
													<div class="col-9 col-lg-10">
														<img src="hotelsimg/<?php echo htmlentities($result->hotelimg);?>" width="300"> &nbsp;&nbsp;&nbsp;
														<a href="up_hotelimg.php?imgid=<?php echo htmlentities($result->hotelid);?>">Change Image
														</a>
													</div>
												</div>
											
	                                        <div class="form-group row">
	                                            <div class="col-3 col-lg-2 col-form-label text-right">
	                                            </div>
	                                            <div class="col-9 col-lg-10">
	                                                <button type="submit" name="submit" class="btn-primary btn">Update Data</button>
	                                            </div>
                                            </div> 
                                        </form>
                                   	<?php }} ?>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>
</html>
<?php } ?>