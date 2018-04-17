<!-- Navigation -->
 <?php 
    
    include 'functions.php';
    include 'database.php';
 
  ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Какой-то логотип</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
           <?php
            $navMenu = [
              "Главная" => "http://lesson1.Batula/" ,
              "Отзывы" => "http://lesson1.Batula/coment.php" ,
              "О нас" => "http://lesson1.Batula/" ,
              "Услуги" => "http://lesson1.Batula/" ,
              "Контакты" => "http://lesson1.Batula/" ,
             
            ];
            foreach ($navMenu as $key => $value){
              echo '<li class="nav-item"><a class="nav-link" href="' . $value . '">' . $key . '</a></li>';
    }        
    ?>
      <? if(isLogin()):?>
              <li class="nav-item"><a class="nav-link" >Привет, <?=$_SESSION['USER_LOGIN']?></a></li>
              <?var_dump($_SESSION['USER_LOGIN']); ?>
              <li class="nav-item"><a href="../index.php" class="nav-link" >Выйти</a></li>
          <? else:?>
              <li class="nav-item"><a class="nav-link" href="/login/">Войти</a></li>
              <li class="nav-item"><a class="nav-link" href="/registration/">Регистрация</a></li>
          <? endif; ?>
          </ul>
        </div>
      </div>
    </nav>
    