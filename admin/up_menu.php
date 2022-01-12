<?php
session_start();
error_reporting(0);
include('includes/conn.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
$menuid=intval($_GET['menuid']);	
if(isset($_POST['submit']))
{
$resnmae=$_POST['resnmae'];
$menuname=$_POST['menuname'];	
$menutype=$_POST['menutype'];
$ingredients=$_POST['ingredients'];
$image=$_FILES["menuimage"]["name"];
$sql="update tblrestaurant_menu set resname=:resnmae,menuname=:menuname,menutype=:menutype,ingredients=:ingredients where menuid=:menuid";
$query = $dbh->prepare($sql);
$query->bindParam(':resnmae',$resnmae,PDO::PARAM_STR);
$query->bindParam(':menuname',$menuname,PDO::PARAM_STR);
$query->bindParam(':menutype',$menutype,PDO::PARAM_STR);
$query->bindParam(':ingredients',$ingredients,PDO::PARAM_STR);
$query->bindParam(':menuid',$menuid,PDO::PARAM_STR);
$query->execute();
$msg="Restaurant Menu Updated Successfully";
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
                                                <li class="breadcrumb-item" aria-current="page">Restaurants</li>
                                                <li class="breadcrumb-item active" aria-current="page">Update Menu</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                    	</div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="card bg-light">
                                    <h5 class="card-header">Update Menu</h5>
                                    <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                                    else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                    <div class="card-body">

									<?php 
									$menuid=intval($_GET['menuid']);
									$sql = "SELECT * from tblrestaurant_menu where menuid=:menuid";
									$query = $dbh -> prepare($sql);
									$query -> bindParam(':menuid', $menuid, PDO::PARAM_STR);
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
                                                <label class="col-3 col-lg-2 col-form-label text-right">Restaurant Name:</label>
                                                <div class="col-9 col-lg-10">
                                                    <input id="" name="resnmae" type="text" required=""placeholder="" class="form-control" value="<?php echo htmlentities($result->resname);?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-lg-2 col-form-label text-right">Menu Name:</label>
                                                <div class="col-9 col-lg-10">
                                                    <input id="" name="menuname" type="text" required=""placeholder="" class="form-control" value="<?php echo htmlentities($result->menuname);?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-lg-2 col-form-label text-right">Menu Type:</label>
                                                <div class="col-9 col-lg-10">
                                                    <input id="" name="menutype" type="text" required=""placeholder="" class="form-control" value="<?php echo htmlentities($result->menutype);?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-lg-2 col-form-label text-right">Ingredients:</label>
                                                <div class="col-9 col-lg-10">
                                                    <input id="" name="ingredients" type="text" required=""placeholder="" class="form-control" value="<?php echo htmlentities($result->ingredients);?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
												<label class="col-3 col-lg-2 col-form-label text-right">Product Image</label>
													<div class="col-9 col-lg-10">
														<img src="menu_img/<?php echo htmlentities($result->menuimage);?>" width="300"> &nbsp;&nbsp;&nbsp;
														<a href="upmenu_img.php?imgid=<?php echo htmlentities($result->menuid);?>">Change Image
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