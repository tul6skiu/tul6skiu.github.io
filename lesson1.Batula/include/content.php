<div class="container">
      <div class="row">
        <!-- Content -->
        <div class="col-md-9">
          
       
          <?php
              $morning = "Доброе утро!";
              $day = "Добрый день!";
              $evening = "Добрый вечер!";
              $night = "Доброй ночи!";
              $minyt = date("i");
              $chasov = date("H");
              if($chasov >= 04) {$hello = $morning;}
              if($chasov >= 10) {$hello = $day;}
              if($chasov >= 16) {$hello = $evening;}
              if($chasov >= 22 or $chasov < 04) {$hello = $night;}
              echo "Время: $chasov:$minyt, $hello";
            ?>


          <!-- Project One -->
          

      

        </div>
