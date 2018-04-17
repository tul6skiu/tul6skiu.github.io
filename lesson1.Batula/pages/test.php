
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
      <?php
       // if(isset($_POST)){
          //  echo '<pre>';
          //      print_r($_POST);
          //      echo '</pre>';
       // }
       
        $dols=fopen('file.txt','a+');
        $email = $_POST['email'];
        $name = $_POST['name'];  
        $text = $_POST['text'];
        $dolsstring = "$email,$name,$text /";
        fwrite($dols,$dolsstring);
        fclose($dols);
      $first = file_get_contents("file.txt");
     
      $ft = explode("/",$first);
     
      
      foreach($ft as $key=>$value){
          $ft[$key]=explode(",",$value);
          print_r($ft[$key]);
      };
      
      foreach($ft as $key=>$value){
          echo '<p>'.$ft[$key][0].'</p><p>'.$ft[$key][1].'</p><p>'.$ft[$key][2].'</p>';
      };
      
       
      
      
      ?>
 <form method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlinput">Example select</label>
    <input name="name" class="form-control" id="exampleFormControlinput">
     
   
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
   </div>
  <button type="submit" class="btn btn-primary">Submit</button>
     
</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
