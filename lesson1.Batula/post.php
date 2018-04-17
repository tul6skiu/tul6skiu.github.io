<?php

   require_once 'database.php';
     require_once 'functions.php';
     ?>
      <?php
   $post_id = $_GET['post_id'];
   //если в post_id не число остановим скрипт
     if(!is_numeric($post_id)) exit();
    //получаем массив  поста
     $post = get_post_by_id($post_id);
    ?>
<!DOCTYPE html>
<html lang="en">

 <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 
    <link href="css/main.css" rel="stylesheet">

  </head>

  <body>

  

  

  <div class="container">
  	<div class="row">
  		<div class="col-md-9">
  			<div class="page-header">
  				<h1><?=$post['title']?></h1>
  				<hr>
  			</div>
              <ul class="list-inline">
                <div class="row">
                  <li><i class="glyphicon glyphicon-list"></i><a href="#"><?=$post['title']?></a> | </li>
                  <li><i class="glyphicon glyphicon-calendar"></i> 7 марта 2018 21:00</li>
                  
                </div>
              </ul>
              <div class="post-content">
               <img src="<?=$post['images']?>">
                 <?=$post['content']?>

            
              </div>
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
   

  
  
   <?php
   
    include 'include/footer.php';

   ?>  




    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>