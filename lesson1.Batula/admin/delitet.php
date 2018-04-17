<meta charset="utf-8">
<?php 

 

  require_once('../database.php');
   require_once('../functions.php');
  
         


  $id = $_GET['id'];

   $count = mysqli_query($link,"DELETE FROM posts WHERE id='$id' ");
     
   echo "Новость успешна удалена!";
?>