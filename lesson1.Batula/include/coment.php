<?php
  if(isset($_POST["done"])){

    if($_POST["name"] == "")
        echo "Введите имя <a href='/'>Исправить</a>";
    else
        header("Localition:index.php");
  }

?>
<?php
$handle = fopen("index.php", "a+");
 if($_POST["done"]){
     echo "
     Имя:$_POST[name]
     <br>CООБЩЕНИЕ:$_POST[message]
     
     ";
 }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      <div class="container">
   <form  action="" method="post">
       <label>Имя:</label><br/>
       <input type="text" name="name" placeholder="Имя" /><br/>
        <label>Email:</label><br/>
       <input type="text" name="email" placeholder="Email" /><br/>
        <label>Сообщение:</label><br/>
       <textarea  name="message" cols="40" rows="10"></textarea> 
  
  <button type="submit" name="done"   value="Готов" class="btn btn-primary">Submit</button>
</form>
      
      </div>
      
     
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>