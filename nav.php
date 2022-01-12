    
    <link rel="stylesheet" href="admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <div class="newsbox-main-menu" style="background-color: #2AF598;">
            <div class="classy-nav-container breakpoint-off" style="background-color: #2AF598;">
                <div class="container-fluid">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="newsboxNav">

                    <!-- search dito -->
                        <!-- Nav brand -->
                        
                        <a href="index.php"><img width="220px" src="img/logo1.png"></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"  style="background-color: #2AF598;"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a  style="background-color: #2AF598;" href="h.php" target="">Home</a></li>
                                    <li><a style="background-color: #2AF598;" href="province.php" target="">The Province</a></li>
                                    <li><a style="background-color: #2AF598;" style="background-color: #2AF598;" style="background-color: #2AF598;" style="background-color: #2AF598;" style="background-color: #2AF598;" href="des.php" target="">Destination</a></li>
                                    <li><a style="background-color: #2AF598;" style="background-color: #2AF598;" style="background-color: #2AF598;" style="background-color: #2AF598;" href="news.php">Latest News and Events</a></li>
                                    <!--<li><a style="background-color: #2AF598;" style="background-color: #2AF598;" style="background-color: #2AF598;" href="hotels.php">Hotels</a></li>
                                    <li><a style="background-color: #2AF598;" style="background-color: #2AF598;" href="restaurants.php">Restaurants</a></li>-->
                                    <li><a style="background-color: #2AF598;" href="prod.php">Products</a></li>

                                    <li><a style="background-color: #2AF598;" href="#">More</a>
                                        <ul class="dropdown bg-info">
                                            <li><a href="ttsis_gallery.php">Gallery</a></li>
                                            <li><a href="missionvision.php">Mission and Vision</a></li>
                                            <li><a href="festival.php">Festivals</a></li>
                                            <li><a href="view_officials.php">Officials</a></li>
                                        </ul>
                                    </li>
                                <li>
                                    <a style="background-color: #2AF598;" style="background-color: #2AF598;" href="contact.php">Contact Us</a>
                                </li>
                                <li>
                                    <a href="searchtumauinisystem.php"><i class="fas fa-search"></i></a>
                                </li>
                                
                                </ul>
                                  <?php 
                                        if($_SESSION['login'])
                                  {?>
                                    &nbsp;&nbsp;
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="label label-pill label-danger count" style="border-radius:10px;">
                                    </span> 
                                    <span class="fa fa-bell" style="font-size:18px;">
                                    </span>
                                </a>
                                <ul class="dropdown-menu" style="max-width: 500px;"></ul>
                                    <?php } ?>
                                <!-- Header Add Area -->
                            </div>
                            <!-- Nav End -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>