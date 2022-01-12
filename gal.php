<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

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
<div class="col-lg-12">
          <div class="row">
            <?php
                $desname=$_GET['desname'];
                $sql = "SELECT * from tblotherimg where destination_name=:desname";
                $query = $dbh -> prepare($sql);
                $query->bindParam(':desname',$desname,PDO::PARAM_STR);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0)
                {
                foreach($results as $result)
                {
            ?>
          <div class="col-md-3 mt-4">
            <div class="item mb-3">
              <a href="admin/des_otherimg/<?php echo htmlentities($result->image); ?>" class="fancybox" data-fancybox="gallery1">
                <img class="img-responsive image-resize" src="admin/des_otherimg/<?php echo htmlentities($result->image); ?>">
              </a>
            </div>
        </div>
      <?php } } ?>
        </div>
      </div>