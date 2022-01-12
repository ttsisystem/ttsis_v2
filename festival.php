<?php
session_start();
error_reporting(0);
include('includes/conn.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tumauini Tourist Spot Information System | Festival</title>
    <link rel="icon" href="img/logo1.png">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="newmeta.css">
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

<style type="text/css">
	.item{
		transition: .5s ease-in-out;
	}
	.item:hover{
		filter:  brightness(75%);
	}
	.image-resize{
		height: 200px;
		width: 500px;
		object-fit: cover;
	}
	.mabuya{
		transition: .5s ease-in-out;
	}
	.mabuya:hover{
		filter: brightness(75%);
	}
	.topitem{
		width: 2999px;
		object-fit: cover;
	}
</style>

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

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <?php include 'nav.php' ?>
    </header>
    	<div class="col-lg-12">
			<div class="row">
				<div class="">
					<img class="topitem" src="admin/festivalfiles/mangi pa more.jpg">
				</div>
			</div>
		</div>
	<div class="container-fluid">
		<hr>
		<div class="col-lg-12 row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<p style="text-align: center; font-size: 18px; color: black;">Tumauni is the home of the “Mangi Festival” which coincides with the patronal town fiesta in honor to St. Mathias. The festival promotes Tumauini as a source of corn and its by-products. “Mangi” is the Ibanag term for “corn” and is celebrated with street dancing along the national hi-way. One of the most enduring legacies of the Spanish colonial era lives on, quite literally in Tumauini, corn (Zea mays). It was one of the plants that came aboard the galleons and became one of the primary crops of the Philippines. It is interesting to note that corn seems to have transcended being a mere crop in Tumauini. The late National Artist for Dance, Ramon Obusan traced the origins of a traditional dance inspired by the crop to Tumauini. Thus, a corn inspired festival seemed especially appropriate for Tumauini</p>
			</div>
			<div class="col-lg-2"></div>
		</div>
		<hr>
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-6">
					<center><h3>Festival Images</h3></center>
				</div>
				<div class="col-lg-6">
					<center><h3>Festival Video</h3></center>
				</div>
			</div>
		</div>
		<hr>
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-6">
					<div class="row">
            <?php
                $sql = "SELECT * from tblfestival WHERE type='image'";
                $query = $dbh -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0)
                {
                foreach($results as $result)
                {
            ?>
					<div class="col-md-4 mt-4">
						<div class="item mb-3">
							<a href="admin/festivalfiles/<?php echo htmlentities($result->file);?>" class="fancybox" data-fancybox="gallery1">
								<img class="img-responsive image-resize" src="admin/festivalfiles/<?php echo htmlentities($result->file);?>">
							</a>
						</div>
				</div>
			<?php } } ?>
		</div>
			</div>
			<div class="col-md-6">
			<?php
                $sql = "SELECT * from tblfestival WHERE type='video'";
                $query = $dbh -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0)
                {
                foreach($results as $result)
                {
            ?>
				<div class="mt-4 mabuya">
					<a href="admin/festivalfiles/<?php echo htmlentities($result->file);?>" class="fancybox" data-fancybox="gallery2">
						<video width="100%" height="100%" src="admin/festivalfiles/<?php echo htmlentities($result->file);?>"></video>
					</a>
				</div>
			<?php } } ?>
			</div>
		</div>
	</div>
</div>
<br>
<hr>
<br>
    <?php include 'tourism/footer.php'; ?>
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
</body>
</html>