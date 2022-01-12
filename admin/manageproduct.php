<?php
session_start();
error_reporting(0);
include('includes/conn.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
?>
<?php
$id = $_GET['id']; // get id through query string

$sql = "DELETE FROM tblproducts WHERE ProdId=:id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt -> execute();
// Delete
if(isset($_POST['btn_delete'])) { 
  $id = $_GET['id']; 
  $stmt->execute();
  header('Location: managedestination.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
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
                                            <li class="breadcrumb-item" aria-current="page">Destination</li>
                                            <li class="breadcrumb-item active" aria-current="page">Manage Destination</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Manage Destinations</h5>
                            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="booktable" class="table table-striped table-bordered first">
                                      <thead>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Location</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                      </thead>
                                      <tbody>
                                        <?php
                                        $sql = "SELECT * from tblproducts";
                      $query = $dbh -> prepare($sql);
                      $query->execute();
                      $results=$query->fetchAll(PDO::FETCH_OBJ);
                      $cnt=1;
                      if($query->rowCount() > 0)
                      {
                      foreach($results as $result)
                      {
                      ?>

                      <div style="margin-top: 70px; " id="myModal" class="modal fade" role="dialog">
                          <div class="row">
                              <div class="container d-flex justify-content-center">
                                  <div class="col-md-6">
                                      <div class="card text-center">
                                          <div class="card-body"> <img style="width: 250px;" src="img/warning.png">
                                              <h5 class="title">Are you sure you want to delete this Data?</h5>
                                              <p class="description"></p>
                                              <div class="row">
                                                  <div class="col-sm-6 mb-2 mb-md-0"> <a href="manageproduct.php?id=<?php echo htmlentities($result->ProdId);?>" style="width: 150px;" name="btn_delete" class="btn btn-out btn-danger btn-square btn-large"> <i class="fa fa-trash"></i> Delete Data</a> </div>
                                                  <div class="col-sm-6 mb-2 mb-md-0"> <button style="width: 150px;" type="button" class="btn btn-out btn-brand btn-square btn-large" data-dismiss="myModal"> <i class="fa fa-times-circle"></i> Cancel</button> </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <tr>
                        <td><?php echo htmlentities($cnt);?></td>
                        <td><?php echo htmlentities($result->ProdName);?></td>
                        <td><?php echo htmlentities($result->ProdType);?></td>
                        <td><?php echo htmlentities($result->ProdLocation);?></td>
                        <td><?php echo htmlentities($result->ProdPrice);?></td>
                        <td>
                          <a href="up_prod.php?pid=<?php echo htmlentities($result->ProdId);?>">
                            <button type="button" class="btn btn-sm btn-primary" style="width: 70px;">Details
                            </button>

                          </a>
                          
                            <button style="margin-top: 5px; width: 70px;" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">Delete
                            </button>
                        </td>
                      </tr>
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