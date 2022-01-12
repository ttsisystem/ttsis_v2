    <section class=" py-5"> 
        <div class="row text-center pt-3">
            <div class="col-lg-12 m-auto">
                <div id="myBtnContainer">
                    <h2>Things To Do</h2>
                    <h6>"There's something for everyone"</h6>
                  <button class="btn active" onclick="filterSelection('all')"> Show all</button>
                  <button class="btn" onclick="filterSelection('Eco Site')"> Eco Site</button>
                    <button class="btn" onclick="filterSelection('Restaurant')"> Eat & Drink</button>
                    <button class="btn" onclick="filterSelection('Resort')"> Resort</button>
                    <button class="btn" onclick="filterSelection('Hotel')"> Hotel</button>
                </div>

<div class="single-slide">
                <div class="container-fluid">
                    <div class="row">
<?php 
$sql = "SELECT * from tbltourpackages ORDER BY PackageId desc ";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
?>  
                        <div class="col-12 col-md-3 column <?php echo htmlentities($result->PackageType);?>">
                            <div class="content">
                            <div class="single-blog-post style-1 mb-30" data-animation="fadeInUpBig" data-delay="300ms" data-duration="1000ms">
                                                    <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail bg-overlay">
                                    <a href="#"><img style="max-height: 200px; min-height: 200px; object-fit: cover;" src="admin/destination_img/<?php echo htmlentities($result->PackageImage);?>" alt=""></a>
                                </div>

                                <div class="blog-content">
                                    <span class="post-date"><?php echo htmlentities($result->Creationdate); ?></span>
                                    <a href="view_destination.php?desid=<?php echo htmlentities($result->PackageId);?>&desname=<?php echo htmlentities($result->PackageName);?>" class="post-title" style="font-size: 17px;"><?php echo htmlentities($result->PackageName); ?></a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <?php } } ?>
<?php 
$sql = "SELECT * from res";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
?>  
                        <div class="col-12 col-md-3 column Restaurant">
                            <div class="content">
                            <div class="single-blog-post style-1 mb-30" data-animation="fadeInUpBig" data-delay="300ms" data-duration="1000ms">
                                                    <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail bg-overlay">
                                    <a href="#"><img style="max-height: 200px; min-height: 200px;" src="admin/res_img/<?php echo htmlentities($result->resimage);?>" alt=""></a>
                                </div>

                                <div class="blog-content">
                                    <span class="post-date"><?php echo htmlentities($result->creationdate); ?></span>
                                    <a href="restaurant_menu.php?resid=<?php echo htmlentities($result->resid);?>&resname=<?php echo htmlentities($result->resname);?>" class="post-title" style="font-size: 17px;"><?php echo htmlentities($result->resname); ?></a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <?php } } ?>
<?php 
$sql = "SELECT * from hotel";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
?>  
                        <div class="col-12 col-md-3 column Hotel">
                            <div class="content">
                            <div class="single-blog-post style-1 mb-30" data-animation="fadeInUpBig" data-delay="300ms" data-duration="1000ms">
                                                    <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail bg-overlay">
                                    <a href="#"><img style="max-height: 200px; min-height: 200px;" src="admin/hotelsimg/<?php echo htmlentities($result->hotelimg);?>" alt=""></a>
                                </div>

                                <div class="blog-content">
                                    <span class="post-date"><?php echo htmlentities($result->creationdate); ?></span>
                                    <a href="view_hotelroom.php?hotelname=<?php echo htmlentities($result->hotelname); ?>" class="post-title" style="font-size: 17px;"><?php echo htmlentities($result->hotelname); ?></a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <?php } } ?>
                        
                    </div>
                </div>
            </div>

            </div>
        </div>
    </section>