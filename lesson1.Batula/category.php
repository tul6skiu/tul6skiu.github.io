
<?php

   require_once 'database.php';
     require_once 'functions.php';

         
     

          ?>
           

<!DOCTYPE html>
<html lang="en">

 <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog</title>

    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 
    <link href="css/main.css" rel="stylesheet">

  </head>

  <body>
  щ
 
     <div class="container">
      <div class="row">
    
        <div class="col-md-9">
          <div class="page-header">
            <?php
              $morning = "Доброе утро!";
              $day = "Добрый день!";
              $evening = "Добрый вечер!";
              $night = "Доброй ночи!";
              $minyt = date("i");
              $chasov = date("H");
              if($chasov >= 04) {$hello = $morning;}
              if($chasov >= 10) {$hello = $day;}
              if($chasov >= 16) {$hello = $evening;}
              if($chasov >= 22 or $chasov < 04) {$hello = $night;}
              echo "Время: $chasov:$minyt, $hello";
            ?>
           
            <h1><?=get_category_title($_GET['id'])?>:</h1>
          </div>
           <?php
              $category_id = $_GET['id'];
              $posts = get_posts_by_category($category_id);
             
              ?>
          
        <?php foreach ($posts as $post): ?>
       
          
            <hr>
          
  
        <div class="row">
            <div class="col-md-5">
              <a href="#" class="thumbnail">
                  <img src="<?=$post['images']?>" alt="">
              </a>
            </div>
            <div class="col-md-7">
            <h4><a href="/post.php?post_id=<?=$post['id']?>"><?=$post['title']?></a></h4>
              <p>
               <?=mb_substr($post['content'], 0, 128, 'utf8').'...'?>
              </p>
              <p><a class="btn btn-info btn-sm" href="/post.php?post_id=<?=$post['id']?>">Читать полностью</a></p>
              <br/>
              <ul class="list-inline">
                <div class="row">
                  <li><i class="glyphicon glyphicon-list"></i><a href="#"><?=$post['title']?></a> | </li>
                  <li><i class="glyphicon glyphicon-calendar"></i> 7 марта 2018 21:00<i> | </i></li>
               
                </div>
              </ul>
            </div>
        </div>
      <hr>
      <?php endforeach;?>
          
      </div>

    <div class="col-md-3">
       <h3 class="my-4">Категории</h3>
              <div class="list-group">
               <?php
          
                 $categories = get_categories();
              ?>
               <?php  if(count($categories) === 0): ?>
                <li><a href="#">Добавить категории</a></li>
              <?php else: ?>
                <?php foreach ($categories as  $category): ?>
                  
             <li><a href="/category.php?id=<?=$category["id"]?>"><?=$category["title"]?></a></li>
                 
                <?php endforeach;?>
               

               <?php endif; ?>
    </div>
  </div>
</div>



    <!-- Sidebar -->
  <?php
   
    include 'include/footer.php';

   ?>  




    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
