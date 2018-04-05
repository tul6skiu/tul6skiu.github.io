<?php

session_start();

$answer1 =$_SESSION['answer1'];
$answer2 = $_SESSION['answer2'];
$answer3 = $_POST['answer3'];


 ?>
<table width="50%" border="1" align='center'>
<tr>

	<td align="center">

		<!-- Верхняя часть страницы -->

		<table width="100%">

			<tr>

				<td align="center">

                    <h1>Ваш результат:</h1>
                    <p><?php
                        if(($answer1 == 4)&& ($answer2 == 6)&&($answer3 == 8)){
    
                                echo 'Все верно';

                            } 
                            if(($answer1 != 4)&&($answer2 == 6)&& ($answer3 ==8)&&($answer1 == 4)&&($answer2 != 6)&& ($answer3 ==8)&&($answer1 == 4)&&($answer2 == 6)&& ($answer3 !=8)){

                                echo 'Верных ответо 2 из 3';
                            }if(($answer1 != 4)&&($answer2 != 6)&& ($answer3 ==8)){
                               echo 'Верных ответов 1 из 3';   
                            }

                        
                        ?></p>
                    


		</td>

	</tr>
        </table>
    

			</tr>

		</table>
