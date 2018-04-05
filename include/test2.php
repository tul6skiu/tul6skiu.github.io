<?php

session_start();

 $answer1 = $_POST['answer1'];


$_SESSION['answer1'] = $answer1;
?>

<table width="50%" border="1" align='center'>
<tr>

	<td align="center">

		<!-- Верхняя часть страницы -->

		<table width="100%">

			<tr>

				<td align="center">

					<h1>Вопрос 2 из 3</h1>
                    <p>3+3 = ?</p>
                    

		<td align="center">

		<form action="\include\test3.php" method="post">
            <input type="text" name="answer2" />
            <input type="submit"/>
        </form>


		</td>

	</tr>
        </table>
    

			</tr>

		</table>



