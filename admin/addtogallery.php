<?php
session_start();
error_reporting(0);
include('includes/conn.php');

if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_POST['submit']))
{
$filetype=$_POST['filetype'];	
$festivalfile=$_FILES["festivalfile"]["name"];
move_uploaded_file($_FILES["festivalfile"]["tmp_name"],"allgallery/".$_FILES["festivalfile"]["name"]);
$sql="INSERT INTO tblgallery_all (type,file) VALUES(:filetype,:festivalfile)";
$query = $dbh->prepare($sql);
$query->bindParam(':filetype',$filetype,PDO::PARAM_STR);
$query->bindParam(':festivalfile',$festivalfile,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="File Uploaded Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}

?>
<?php
$id = $_GET['id']; // get id through query string

$sql = "DELETE FROM tblgallery_all WHERE id=:id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt -> execute();
// Delete
if(isset($_POST['btn_delete'])) { 
  $id = $_GET['id']; 
  $stmt->execute();
  header('Location: addtogallery.php');
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
                                                <li class="breadcrumb-item" aria-current="page">Destination</li>
                                                <li class="breadcrumb-item active" aria-current="page">Add File to Gallery (Image/Video)</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                    	</div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="card bg-light">
                                    <h5 class="card-header">Add File to Gallery (Image/Video)</h5>
                                    <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                                    else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                    <div class="card-body">
                                        <form name="package" method="post" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-3 col-lg-2 col-form-label text-right">Select File Type:</label>
                                                <div class="col-9 col-lg-10">
                                                <select class="form-control" id="input-select" name="filetype">
                                                    <option disabled value="">--Select File Type--</option>
                                                    <option value="Image">Image</option>
                                                    <option value="Video">Video</option>
                                                </select>
                                                </div>
                                            </div> 
                                            <div class="form-group row">
                                                <label class="col-3 col-lg-2 col-form-label text-right">Gallery File (Image/Video)</label>
                                                <div class="col-9 col-lg-10">
                                                <input type="file" name="festivalfile" id="packageimage" required>
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-center">
                                                <div>
                                                    <button type="submit" name="submit" class="btn-primary btn">Upload</button>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <button type="reset" class="btn-inverse btn">Reset</button>
                                                </div>
                                            </div> 
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                    <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Manage Gallery Files</h5>
                            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="booktable" class="table table-striped table-bordered first">
                                        <thead>
                                            <th>#</th>
                                            <th>File Type</th>
                                            <th>File Name</th>
                                            <th>Upload Date/Time</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * from tblgallery_all";
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
                                                <td><?php echo htmlentities($result->type);?></td>
                                                <td><?php echo htmlentities($result->file);?></td>
                                                <td><?php echo htmlentities($result->creationdate);?></td>
                                                <td>
                                                        <a class="btn btn-sm btn-danger" name="btn_delete" data-toggle="" data-target="#" href="addtogallery.php?id=<?php echo htmlentities($result->id);?>">Delete</a>
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