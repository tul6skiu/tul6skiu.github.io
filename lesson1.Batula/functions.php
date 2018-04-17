<?php
  
  function get_categories(){

  	global $link;

$sql = "SELECT * FROM categories";

  $result = mysqli_query($link, $sql);

 $categories = mysqli_fetch_all($result,MYSQLI_ASSOC); 

 return $categories;

   

   
  }
  
  function get_posts(){

  	global $link;

  	 $sql = "SELECT * FROM posts";

  	 $result =mysqli_query($link, $sql);

  	  $posts = mysqli_fetch_all($result,MYSQLI_ASSOC); 

  	  return $posts;
  }


  
  function get_post_by_id($post_id){

  	global $link;

  	$sql = "SELECT * FROM posts WHERE id = ".$post_id;

  	$result = mysqli_query($link, $sql);

  	$post = mysqli_fetch_assoc($result);

  	return $post;
  }

  function get_posts_by_category($category_id){

  	global $link;

  	$category_id = mysqli_real_escape_string($link, $category_id);

  	$sql = 'SELECT *FROM posts WHERE category_id ="'.$category_id.'"';

  	$result =mysqli_query($link, $sql);

  	  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC); 

  	  return $posts;
  }


   function get_category_title($category_id){

     global $link;

     $category_id =mysqli_real_escape_string($link, $category_id);

     $sql = 'SELECT title FROM categories WHERE id = "'.$category_id.'"';

     $result = mysqli_query($link, $sql);

     $category = mysqli_fetch_assoc($result);

     return $category['title'];
   	 
   }
function isLogin(){
    if($_SESSION['USER_LOGGED_IN'] == 1) return true;
    else return false;
}

function generatePassword($password){
    return md5(md5($password).'ergwreg4whtrherth');
 
}
 function generateCookieHash(){

    return md5(rand(1,99999));

}

   
?>