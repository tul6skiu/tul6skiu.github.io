
<!DOCTYPE html>
<html lang="ru">

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

<!-- Navigation -->

 <br/>
  <br/>
   <br/>
<?php
//
  

if(isset($_POST['register'])){




        $login = strip_tags(trim($_POST['login']));
        $password = strip_tags(trim($_POST['password']));
        $password2 = $_POST['password2'];
          $email = strip_tags(trim($_POST['email']));

          if($password == $password2 ){
            $sql = "SELECT * FROM users where login = '{$login}' or email = '{$email}' ";
           
         
            $res = mysqli_query($link,$sql);
            $count = mysqli_num_rows($res);
           


            if( $count == 0 ){
               $password = generatePassword('$password');

               $hash = generateCookieHash();
                $sql = "INSERT INTO  users(login,email,password,hash) values ('{$login}','{$email}','{$password}','{$hash}')";

                $res = mysqli_query($link,$sql);

                if($res) echo 'Вы успешно зарегистрировались';
                else echo 'что то пошло не так'.$sql;
            }else{
                echo ' Извините пользователь с таким логином или email уже существует';
            }
          }else{
            echo 'Извините пароль не совпадает';
          }

    }




?>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Content -->
        <div class="col-md-9">
            <div class="pt-4">
                <h2>Регистрация</h2>
                <form class="form-horizontal" action="/login/index.php" method="POST">
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="inputLogin">Логин:</label>
                        <div class="col-xs-9">
                            <input type="text" name="login" class="form-control" id="inputLogin" placeholder="Логин" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="inputEmail">Email:</label>
                        <div class="col-xs-9">
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="inputPassword">Пароль:</label>
                        <div class="col-xs-9">
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Введите пароль" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="confirmPassword">Подтвердите пароль:</label>
                        <div class="col-xs-9">
                            <input type="password"  name="password2" class="form-control" id="confirmPassword" placeholder="Введите пароль ещё раз" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-9">
                            <input type="submit" name="register" class="btn btn-primary" value="Регистрация">
                            <input type="reset" class="btn btn-default" value="Очистить форму">
                        </div>
                    </div>
                </form>
            </div>
        </div>
     
        <div class="clearfix"></div>
    </div>

</div>
<!-- /.container -->

<!-- Footer -->
<?php 

   include ('../include/footer.php');
 
  ?>



    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>