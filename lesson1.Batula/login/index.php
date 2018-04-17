 <?php
  session_start();
if(isLogin()) header('Location: ' . SITE_URL);
if(isset($_POST['auth'])){
    $login = strip_tags(trim($_POST['login']));
    $password = strip_tags(trim($_POST['password']));
    $sql = "SELECT * FROM users WHERE login = '{$login}' LIMIT 1";
    $res = mysqli_query($link, $sql);
  
    

    if(mysqli_num_rows($res) > 0){
        //Пользовель по логину
        $user = mysqli_fetch_assoc($res);
     var_dump($user);

            if(generatePassword($password) == $user['password']){

            $_SESSION['USER_LOGGED_IN'] = 1;
            $_SESSION['USER_LOGIN'] = $user['login'];
        
            header('Location: ' . SITE_URL);

            if($_POST['rememberme']){
                $hash = generateCookieHash();
                setcookie('hash', $hash, time() + 3600 * 24 * 7);
                $sql = "UPDATE users SET hash = '{$hash}' WHERE login = '{$login}'";
                mysqli_query($link, $sql);
            }
            echo "вы зашли под своей учетной записью";
        }

    }else{
        $msg = 'Такого логина или пароля не существует!';
    }
}?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Авторизация</title>

    
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 
</head>

<body>
    <?
    require_once('../database.php');
   require_once('../functions.php');?>


  <br/>
  <br/>
  

<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Content -->
        <div class="col-md-9">
            <div class="pt-4">
                <br/>
                <h2>Авторизация</h2>
                <p style="color: #f00; font-weight: 700"><?=$msg;?></p>
                <form class="form-horizontal" action="../index.php" method="POST">
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="inputLogin">Логин:</label>
                        <div class="col-xs-9">
                            <input type="text" name="login" class="form-control" id="inputLogin" placeholder="Логин">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="inputPassword">Пароль:</label>
                        <div class="col-xs-9">
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Введите пароль">
                        </div>
                    </div>
                    <div class="form-group">
                          <input type="checkbox" name="rememberme">Запомнить меня
                    </div>
                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-9">
                            <input type="submit" name="auth" class="btn btn-primary" value="Авторизироваться">
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