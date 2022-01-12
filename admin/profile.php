<?php
session_start();
error_reporting(0);
include('includes/conn.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
// Code for change password 
if(isset($_POST['submit']))
    {
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$username=$_SESSION['alogin'];
    $sql ="SELECT Password FROM admin WHERE UserName=:username and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update admin set Password=:newpassword where UserName=:username";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your Password succesfully changed";
}
else {
$error="Your current password is wrong";    
}
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

  <link href="assets/css/style.css" rel="stylesheet">
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

  <script type="text/javascript">
    function valid()
    {
    if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
    {
    alert("New Password and Confirm Password Field do not match  !!");
    document.chngpwd.confirmpassword.focus();
    return false;
    }
    return true;
    }
  </script>
    
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
                                            <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Change Password<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?></h5>
                                
                                <div class="card-body">
                                    <form name="chngpwd" method="post" class="form-horizontal" onSubmit="return valid();">
                                        <div class="form-group row">
                                            <label class="col-3 col-lg-2 col-form-label text-right">Current Password:</label>
                                            <div class="col-9 col-lg-8">
                                                <input id="pwd1" name="password" type="password" required="" data-parsley-type="password" placeholder="Current Password*" class="form-control">
                                            </div>
                                            <div class="col-9 col-lg-2">
                                                <a href="#" onclick="pass1()" class="btn btn-md btn-outline-primary">Show Password</a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-lg-2 col-form-label text-right">New Password:</label>
                                            <div class="col-9 col-lg-8">
                                                <input id="pwd2" name="newpassword" type="password" required="" placeholder="New Password*" class="form-control">
                                            </div>
                                            <div class="col-9 col-lg-2">
                                                <a href="#" onclick="pass2()" class="btn btn-md btn-outline-primary">Show Password</a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-lg-2 col-form-label text-right">Confirm Password:</label>
                                            <div class="col-9 col-lg-8">
                                                <input id="pwd3" name="confirmpassword" type="password" required="" data-parsley-type="url" placeholder="Confirm Password*" class="form-control">
                                            </div>
                                            <div class="col-9 col-lg-2">
                                                <a href="#" onclick="pass3()" class="btn btn-md btn-outline-primary">Show Password</a>
                                            </div>
                                        </div>
                                        <div class="row container">
                                            
                                            <div class="col-sm-6">
                                                <p class="text-right">
                                                    <button type="submit" name="submit" class="btn btn-space btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-space btn-secondary">Cancel</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
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
    
    <script type="text/javascript">
        function pass1() {
            var x = document.getElementById("pwd1");
            if (x.type === "password") {
            x.type = "text";
            } else {
                x.type = "password";
                }
            }
    </script>
    <script type="text/javascript">
        function pass2() {
            var x = document.getElementById("pwd2");
            if (x.type === "password") {
            x.type = "text";
            } else {
                x.type = "password";
                }
            }
    </script>
    <script type="text/javascript">
        function pass3() {
            var x = document.getElementById("pwd3");
            if (x.type === "password") {
            x.type = "text";
            } else {
                x.type = "password";
                }
            }
    </script>
</body>
 
</html>
<?php } ?>