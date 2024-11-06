<?php
session_start();

$_SESSION['name'] = $_POST['name'];
$_SESSION['ap1'] = $_POST['ap1'];
$_SESSION['ap2'] = $_POST['ap2'];

if(!isset($_SESSION['numQuiz'])){
   $_SESSION['numQuiz'] = 0;
}else if($_SESSION['numQuiz'] == 3){
   header('Location: felicitacio.php');
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Quiz fácil</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
   <section class="container">
      <h2 style="margin-top: 20px;">Test Fácil</h2>
      <?php
         include_once 'quiz.php';

            $i = $_SESSION['numQuiz'];

            echo '
               <h4>'.$quizFacil[$i]['pregunta']. '</h4>
               <form action="" method="post">
                  <div class="form-check">
                     <input class="form-check-input" type="radio" name="respuesta" id="respuesta1">
                     <label class="form-check-label" for="respuesta1">
                        ' . $quizFacil[$i]['respuestas'][0] . '
                     </label>
                  </div>
                  <div class="form-check">
                     <input class="form-check-input" type="radio" name="respuesta" id="respuesta2">
                     <label class="form-check-label" for="respuesta2">
                        ' . $quizFacil[$i]['respuestas'][1] . '
                     </label>
                  </div>
                  <div class="form-check">
                     <input class="form-check-input" type="radio" name="respuesta" id="respuesta3">
                     <label class="form-check-label" for="respuesta3">
                        ' . $quizFacil[$i]['respuestas'][2] . '
                     </label>
                  </div>
                  <div class="form-check">
                     <input class="form-check-input" type="radio" name="respuesta" id="respuesta4">
                     <label class="form-check-label" for="respuesta4">
                        ' . $quizFacil[$i]['respuestas'][3] . '
                     </label>
                  </div>  
            ';
            
      ?>
         <div class="col-12">
            <button class="btn btn-primary" type="submit" style="margin-top: 10px;">Enviar</button>
         </div>
      </form>
   </section>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>