<?php
session_start();
error_reporting(0);
include('includes/conn.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 
    // code for cancel
if(isset($_REQUEST['bkid']))
    {
$bid=intval($_GET['bkid']);
$status=2;
$cancelby='a';
$sql = "UPDATE tblbooking SET status=:status,CancelledBy=:cancelby WHERE  BookingId=:bid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> bindParam(':cancelby',$cancelby , PDO::PARAM_STR);
$query-> bindParam(':bid',$bid, PDO::PARAM_STR);
$query -> execute();

$msg="Booking Cancelled successfully";
}


if(isset($_REQUEST['bckid']))
    {
$bcid=intval($_GET['bckid']);
$status=1;
$cancelby='a';
$sql = "UPDATE tblbooking SET status=:status WHERE BookingId=:bcid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':bcid',$bcid, PDO::PARAM_STR);
$query -> execute();
$msg="Booking Confirm successfully";
}
?>
<?php
$id = $_GET['id'];

$sql = "DELETE FROM feedback WHERE id=:id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt -> execute();
// Delete
if(isset($_POST['btn_delete'])) { 
  $id = $_GET['id']; 
  $stmt->execute();
  header('Location: reviewrate.php');
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
                                            <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Booking</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Booking Table</h5>
                            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="booktable" class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Rate ID</th>
                                                <th>Email Address</th>
                                                <th>Star Rate</th>
                                                <th>Comment</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $sql = "SELECT * FROM feedback";
                                            $query = $dbh -> prepare($sql);
                                            $query->execute();
                                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt=1;
                                            if($query->rowCount() > 0)
                                            {
                                            foreach($results as $result)
                                            {
                                        ?>  
                            <tr>
                            <td><?php echo htmlentities($cnt);?></td>
                            <td> RT-<?php echo htmlentities($result->id);?></td>
                            <td><?php echo htmlentities($result->email);?></td>
                            <td><?php echo htmlentities($result->rating);?></td>
                            <td><?php echo htmlentities($result->feedback);?></td>
                            <td>
                                <a class="btn btn-sm btn-danger" name="btn_delete" data-toggle="" data-target="#" href="reviewrate.php?id=<?php echo htmlentities($result->id);?>">
                                    Delete
                                </a>
                            </td>
                                            <?php $cnt=$cnt+1;} }?>
                                        </tbody>
                                    </table>
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