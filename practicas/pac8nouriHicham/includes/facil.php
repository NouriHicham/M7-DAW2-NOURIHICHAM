<?php
include_once 'quiz.php';

echo '<h2 style="margin-top: 20px;">Test Fácil</h2>';

if (!isset($_POST["quiz"])) {
} else if (strtoupper($_POST["quiz"]) == strtoupper($quiz["facil"][$_SESSION["i"]]["respuesta"])) {
   //correcto
   echo '<div class="container bg-success text-white p-2 style="margin: 15px 0"">Correcto</div> ';
   $_SESSION["i"]++;
} else if (!(strtoupper($_POST["quiz"]) == strtoupper($quiz["facil"][$_SESSION["i"]]["respuesta"]))) {
   //incorrecto
   echo '<div class="container bg-danger text-white p-2">Fallaste</div>';
}

echo '
   <div class="mb-3">
      <label for="quiz" class="form-label">' . $quiz["facil"][$_SESSION["i"]]["pregunta"] . '</label>
      <input type="text" class="form-control" id="quiz" placeholder="Escriba la respuesta" name="quiz">
   </div>
';
?>