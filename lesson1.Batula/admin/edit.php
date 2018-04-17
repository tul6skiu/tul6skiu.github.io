
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog</title>

    
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 
</head>
<body>
 <?php

  require_once('../database.php');
   require_once('../functions.php');
  
          ?>
   <?php 
   //передаем значения id posta  в сылку редактирования записи
     $id = $_GET['id'];
    global $link;        
            $result = mysqli_query($link,"SELECT title,content,images,category_id FROM posts WHERE id='$id' ");
            

          $post = mysqli_fetch_assoc($result);

//Условие если нажата кнопка сохранить то обновляем значения
          if(isset($_POST['save'])){

                $title  = strip_tags(trim($_POST['title']));
                var_dump($title);
                $content  = strip_tags(trim($_POST['content']));
                 var_dump($content);
                 $category_id  = strip_tags(trim($_POST['category_id']));
                  var_dump($category_id);
                  $images  = strip_tags(trim($_POST['images']));

              $count =  mysqli_query($link,"UPDATE posts SET title='$title', content='$content',category_id = '$category_id', images = '$images' WHERE id='$id'  ");
                 var_dump($count);

                 echo "Информация успешна изменена";
          }
          ?>

   
<div class="container">

    <div class="row">

        <!-- Content -->

        <div class="col-md-12">

            <h1>Редактирование записи в БД</h1>


             <form class="pt-4 pb-4" method="post" action="edit.php?id=<? echo $id;?>"> 
               <div class="form-group">
                <label for="exampleFormControlInput1">Название статьи</label>
                <input type="text" name="title"  class="form-control" id="exampleFormControlInput1" value="<?php echo($post['title'])?>" /><br/>
            </div>

     <div class="form-group">
        <label for="exampleFormControlInput2">Текс Новости</label>
        <textarea cols="40" name="content"  class="form-control" rows="10"/><?php echo($post['content'])?></textarea><br/>
   </div>
   <div class="form-group">

                    <input name="images"  type="file" value="<?php echo($post['images'])?>">

                </div>

    <div class="form-group">
    <label for="exampleFormControlSelect1">Выберите категорию</label>
    <input type="text"  class="form-control" name="category_id" value="<?php echo($post['category_id'])?>" /><br/>
</div>
      <br/>
    <input type="submit" name="save" value="Cохранить запись" class="btn btn-primary">

   </form>
           


        </div>

        <div class="clearfix"></div>

    </div>

</div>




 <!--?php
  if(isset($_POST['add'])){

   global $link;

  $title  = strip_tags(trim($_POST['title']));


  $content  = strip_tags(trim($_POST['content']));
  
  $category_id  = strip_tags(trim($_POST['category_id']));

  $images  = strip_tags(trim($_POST['images']));


   

  $sql =  mysqli_query($link,"INSERT INTO posts(`title`,`content`,`images`,`category_id`)VALUES('$title','$content','$images','$category_id')");
  var_dump($sql);
         
  $result = mysqli_query($link, 'SELECT * FROM posts');

   echo "Новость успешна добавлена";
  }
  ?-->
  

         



</body>
</html>
 