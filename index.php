<?php

//стартуем сессию
session_start();

//подлючаем библиотеку
require_once './vendor/autoload.php';

//создаем несколько переменных с параметрами из консоли гугл
$client_id = '873089922969-ec3v84q2jd3iktcc4mt1drsbuk24su4d.apps.googleusercontent.com';
$client_secret = 'AALw7koJhfrVnRCgmqiHvk9b';
$redirect_uri = 'http://localhost/index.php';
$api_key = 'AIzaSyD4jlIWjVB9tBZn4V32zfR2U1uo-A9QsIk';

//создаем клиент
 $client = new Google_Client();
    $client->setApplicationName("Google Calendar API"); //название приложения
    $client->setRedirectUri($redirect_uri);
    $client->setClientId($client_id);
    $client->setClientSecret($client_secret);
    $client->setDeveloperKey($api_key);
    //необходимо для получение рефрештокена
    $client->setAccessType('offline');
    $client->setApprovalPrompt('force');




//необходимые разрешения, весь список на https://developers.google.com/identity/protocols/googlescopes


    $client->addScope("https://www.googleapis.com/auth/calendar");
  


//если был передан параметр CODE, значит скрипт запустил ГУГЛ, чтобы передать авторизаци

     if (!isset($_GET['code'])) {
  $auth_url = $client->createAuthUrl();
  header('Location: ' . $auth_url);
} else{
    $client->authenticate($_GET['code']);
	//сохраняем сессию
	$_SESSION['access_token'] = $client->getAccessToken();
}

	//Если User нажал кнопку забронировать,то запускаем код бронирования
if(isset($_POST['addEventSubmit'])){
    
   
    //информация с форм
     $inputDate = $_POST['inputDate'];
     $startTime = $_POST['inputStartTime'];
     $endTime = $_POST['inputEndTime'];
     $inputClientName = $_POST['inputClientName'];
     $inputClientPhoneNumber = $_POST['inputClientPhoneNumber'];
     $inputSlug = $_POST['inputSlug'];
    
    

  
    //время
    $tz = (new \DateTime())->getTimezone()->getName();
            //время начала бронирования
            $startDate = new \DateTime($inputDate . 'T' . $startTime, new \DateTimeZone($tz));
            $startTime = $startDate->format(DATE_ATOM);
            //время окончания бронирования
            $endDate = new \DateTime($inputDate . 'T' . $endTime, new \DateTimeZone($tz));
            $endTime = $endDate->format(DATE_ATOM);
    
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
   //передадим токин из сессии в клиент
	$client->setAccessToken($_SESSION['access_token']);
    //Создаем id календаря
  $calendarId = 'tulaa478@gmail.com';
    
 //создаем объект который будет отоброжаться в записи
  $optParams = new Google_Service_Calendar_Event([
      'summary' => 'Забронировано',
                'description' => "
                Вид услуги : $inputSlug
                Имя клиента: $inputClientName
                Контактный номер: $inputClientPhoneNumber ",
                'start' => [
                    'dateTime' => $startTime
                ],
                'end' => [
                    'dateTime' => $endTime
                ]
    
  ]);
     
  $service = new Google_Service_Calendar($client);
      //передаем календ 2 параметра 1-это id календаря 2-передаем объект
  $results = $service->events->insert($calendarId, $optParams);
  }
}


  
   


?>

 
 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

   
  </head>
  <body>
   
    <div class="container">
        <div class="row">
           <div class="col-md-12">
               <img src="img/man.jpg" alt="">
           </div>
            
        </div>
    
  <div class="container">
      <div class="row">
         <div class="col-md-9"> <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=tulaa478%40gmail.com&amp;color=%231B887A&amp;ctz=Europe%2FMoscow" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe></div>
         <div class="col-md-3">
               <form method="post" action="index.php">
                <label for="inputSlug">Выберите услугу:</label>
               <select class="form-control form-control-sm" id="inputSlug">
                      <option value="t1">Маникюр</option>
                       <option value="t2">Мейкап</option>
                        </select>
                <div class="form-group">
                    <label for="inputDate">Выберите день недели:</label>
                    <input type="date" class="form-control" id="inputDate" name="inputDate" required autofocus>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="inputStartTime">с:</label>
                            <input type="time" class="form-control" id="inputStartTime" name="inputStartTime" required></div>
                        <div class="col-sm-6">
                            <label for="inputEndTime">до:</label>
                            <input type="time" class="form-control" id="inputEndTime" name="inputEndTime" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputClientName">Как вас зовут:</label>
                    <input type="text" class="form-control" id="inputClientName" name="inputClientName"
                           placeholder="Введите имя..." required>
                </div>
                <div class="form-group">
                    <label for="inputClientPhoneNumber">Мобильный телефон:</label>
                    <input type="text" class="form-control" id="inputClientPhoneNumber" name="inputClientPhoneNumber"
                           placeholder="Введите контакнтый номер телефона..." required>
                </div>
                 <div class="form-group">
                    <input type="submit" class="btn btn-warning" value="Забронировать" name="addEventSubmit">
                </div>
             </form>
         
      </div>
  </div>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>

</html>

<!--//если передан параметр action=logout, выходим-->
<!--/*if((isset($_GET['action'])) && ($_GET['action'] == 'logout')) {
	//пользователь нажал выход, отзываем токен
    if (isset($token['refresh_token'])) {

      $tokenString = $token['refresh_token'];
    } else {
      $tokenString = $token['access_token'];
       
    }
	//сбрасываем сессию
	unset($_SESSION['access_token']);
	//перезагружаем страницу
	header('Location: ' . $redirect_uri);
}*/-->
