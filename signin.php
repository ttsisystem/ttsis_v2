<?php
session_start();
include('../includes/conn.php');
if(isset($_POST['signin']))
{
$semail=$_POST['semail'];
$pass=md5($_POST['pass']);
$sql ="SELECT EmailID, Password FROM tblusers WHERE emailid=:semail and Password=:pass";
$query= $dbh -> prepare($sql);
$query-> bindParam(':semail', $semail, PDO::PARAM_STR);
$query-> bindParam(':pass', $pass, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['login']=$_POST['semail'];
echo "<script type='text/javascript'> document.location = '../index.php'; </script>";
} else{
	
	echo "<script>alert('Email or Password is Invalid!');</script>";

}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">
<section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log in</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="semail" id="your_name" placeholder="Email*" required="true" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="your_pass" placeholder="Password*" required="true" />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <br>
                        <div class="">
                            <span class="social-label">Don't have an Account? <a href="signup.php">SIGN UP</a></span>
                        </div>
                        <br>
                        
                        <div class="">
                            <a href="../index.php" class="btn-inverse"><h3 class="form-title"><i class="fas fa-arrow-left">Back</i></h3></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</html>