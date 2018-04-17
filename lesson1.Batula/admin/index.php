<!DOCTYPE html>


 <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>admin</title>

    
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 
    <link href="css/main.css" rel="stylesheet">

  </head>

  <body>
    <?php

   require_once('../database.php');
   require_once('../functions.php');
         
     

          ?>

  <br/>

  <br/>


 
 


       

<div class="container">

    <div class="row">

        <!-- Content -->

        <div class="col-md-12">
              <h1>Панель редактирования:</h1>



            <div class="pt-4">

                <table class="table">

                    <thead class="thead-dark">

                    <tr>

                        <th scope="col">id</th>

                        <th scope="col">Название</th>

                        <th scope="col">Контент поста</th>

                        <th scope="col">Номер категории</th>

                        <th scope="col">Действия</th>

                    </tr>

                    </thead>
                  
                    <tbody>
   
                       <div class="container">
                           <div class="row">
                                 <?php
            $post=get_posts();
          ?>
        <?php foreach ($post as $post): ?>
          
            
          
               <tr>

                        <th scope="row"><?=$post['id']?></th>

                        <td><?=$post['title']?></td>

                        <td><?=$post['content']?></td>

                        <td><?=$post['category_id']?></td>

                        <td>

                          <ul class="list-inline">
                     <div class="row">

                 <li>   <a href="add.php?id=<?php echo($post['id'])?>">add</a> | </li>
                   <li>   <a href="edit.php?id=<?php echo($post['id'])?>">edit</a> | </li>
                   <li>   <a href="delitet.php?id=<?php echo($post['id'])?>">del</a></li>
                
                </div>
              </ul>

                        </td>

                    </tr>
                     <?php endforeach;?>
               </div>
           </div>



                    </tbody>

                </table>

            </div>

        </div>

        <div class="clearfix"></div>

    </div>



</div>

<?php 

   include ('../include/footer.php');
 
  ?>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>




<!--<div class="container">

    <div class="row">

        <!-- Content -->

        <!--div class="col-md-12">
           

            <div class="pt-4">

                <table class="table">

                    <thead class="thead-dark">

                    <tr>

                        <th scope="col">id</th>

                        <th scope="col">Название</th>

                        <th scope="col">Контент поста</th>

                        <th scope="col">Номер категории</th>

                        <th scope="col">Действия</th>

                    </tr>

                    </thead>
                  
                    <tbody>
   
                       <div class="container">
                           <div class="row">
                                 <?php
            $post=get_posts();
          ?>
        <?php foreach ($post as $post): ?>
          
            
          
               <tr>

                        <th scope="row"><?=$post['id']?></th>

                        <td><?=$post['title']?></td>

                        <td><?=$post['content']?></td>

                        <td><?=$post['category_id']?></td>

                        <td>

                            <a href="add.php">add</a> |

                            <a href="#">edit</a> |

                            <a href="#">del</a>

                        </td>

                    </tr>
                     <?php endforeach;?>
               </div>
           </div>



                    </tbody>

                </table>

            </div>

        </div>

        <div class="clearfix"></div>

    </div>



</div>-->
