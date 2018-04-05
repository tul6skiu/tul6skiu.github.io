<?php

session_start();

 $answer2 = $_POST['answer2'];
$_SESSION['answer2'] = $answer2;

?>

<table width="50%" border="1" align='center'>
<tr>

	<td align="center">

		<!-- Верхняя часть страницы -->

		<table width="100%">

			<tr>

				<td align="center">

                    <h1>Вопрос 3:</h1>
                    <p>4+4 = ?</p>
                    

		<td align="center">

		<form action="\include\result.php" method="post">
        <input type="text" name="answer3" />
        <input type="submit"/>
            </form>


		</td>

	</tr>
        </table>
    

			</tr>

		</table>


