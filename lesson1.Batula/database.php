<?php 

 $link = mysqli_connect('localhost','root','','my_first_blog');

 if(mysqli_connect_errno()){
 	echo "failend to connect to MySQL:" . mysqli_error();
  exit();
 }


 
            $navMenu = [
              "Главная" => "http://lesson1.Batula/" ,
              "Отзывы" => "http://lesson1.Batula/coment.php" ,
              "О нас" => "http://lesson1.Batula/" ,
              "Услуги" => "http://lesson1.Batula/" ,
              "Контакты" => "http://lesson1.Batula/" ,
             
            ];




?>