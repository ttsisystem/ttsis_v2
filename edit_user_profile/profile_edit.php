<?php
session_start();
error_reporting(0);
include('../includes/conn.php');

$eid=($_GET['EmailId']);	
if(isset($_POST['submit']))
{
$uname=$_POST['uname'];
$uadd=$_POST['uadd'];	
$umobile=$_POST['umobile'];
$uemail=$_POST['uemail'];
$sql="update tblusers set FullName=:uname,address=:uadd,MobileNumber=:umobile,EmailId=:uemail where EmailId=:eid";
$query = $dbh->prepare($sql);
$query->bindParam(':uname',$uname,PDO::PARAM_STR);
$query->bindParam(':uadd',$uadd,PDO::PARAM_STR);
$query->bindParam(':umobile',$umobile,PDO::PARAM_STR);
$query->bindParam(':uemail',$uemail,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
header('Location: profile_edit.php?EmailId='.$uemail.'&&UserProfile_Updated_Successfully!');
}
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../admin/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../admin/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../admin/assets/libs/css/style.css">
    <link rel="stylesheet" href="../admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../admin/assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="../admin/assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="../admin/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../admin/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../admin/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>User Profile | Dashboard</title>
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
    include 'sidebar_user.php';
    include 'navbar_user.php';
?>
            <div class="dashboard-wrapper">
                <div class="dashboard-ecommerce">
                    <div class="container-fluid dashboard-content ">
                    	<div class="row">
                    		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header">
                                    <h2 class="pageheader-title">Update/Edit Profile</h2>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">User Profile</a></li>
                                                <li class="breadcrumb-item" aria-current="page">Update</li>
                                                <li class="breadcrumb-item" aria-current="page">Manage Profile</li>
                                                <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                    	</div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="card bg-light">
                                    <h5 class="card-header">Update Profile</h5>
                                    <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                                    else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                    <div class="card-body">

									<?php 
									$eid=($_GET['EmailId']);
									$sql = "SELECT * from tblusers where EmailId=:eid Limit 1";
									$query = $dbh -> prepare($sql);
									$query -> bindParam(':eid', $eid, PDO::PARAM_STR);
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
                                                <label class="col-3 col-lg-2 col-form-label text-right">User Full Name:</label>
                                                <div class="col-9 col-lg-10">
                                                    <input id="" name="uname" type="text" required=""placeholder="" class="form-control" value="<?php echo htmlentities($result->FullName);?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-lg-2 col-form-label text-right">User Address:</label>
                                                <div class="col-9 col-lg-10">
                                                    <input id="" name="uadd" type="text" required=""placeholder="" class="form-control" value="<?php echo htmlentities($result->address);?>" placeholder="Address">
                                                </div>
                                            </div> 
                                            <div class="form-group row">
                                                <label class="col-3 col-lg-2 col-form-label text-right">Mobile Number:</label>
                                                <div class="col-9 col-lg-10">
                                                    <input id="" name="umobile" type="text" required=""placeholder="" class="form-control" value="<?php echo htmlentities($result->MobileNumber);?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-lg-2 col-form-label text-right">Email Address:</label>
                                                <div class="col-9 col-lg-10">
                                                    <input id="" name="uemail" type="text" required=""placeholder="" class="form-control" value="<?php echo htmlentities($result->EmailId);?>">
                                                </div>
                                            </div>
	                                        <div class="form-group row">
	                                            <div class="col-3 col-lg-2 col-form-label text-right">
	                                            </div>
	                                            <div class="col-9 col-lg-10">
	                                                <button type="submit" name="submit" class="btn-primary btn">Update Profile</button>
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



    <script src="../admin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="../admin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="../admin/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="../admin/assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="../admin/assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="../admin/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="../admin/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="../admin/assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="../admin/assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="../admin/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="../admin/assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="../admin/assets/libs/js/dashboard-ecommerce.js"></script>
</body>
</html>