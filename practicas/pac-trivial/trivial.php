<?php
session_start();

if(!isset($_SESSION['aciertos'])){
   $_SESSION['aciertos'] = 0;
}

if($_SESSION['aciertos'] > count($_SESSION['trivial'])){
   header('Location: https://enhorabuenaweb.wordpress.com/');
   exit;
}

if(isset($_POST['respuesta'])){
   if($_POST['respuesta'] == str_replace(" ", "", $_SESSION['trivial'][$_SESSION['aciertos']]['answer'])) {
      $_SESSION['aciertos'] = $_SESSION['aciertos'] + 1;
   }else{
      $error='respuesta incorrecta';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   <section class="container mt-5">
      <h3 class="text-center mb-4"><?= $_SESSION['trivial'][$_SESSION['aciertos']]['question'] ?></h3>
      <form action="trivial.php" method="post">
      <?php
         for($i=0 ; $i<count($_SESSION['trivial'][$_SESSION['aciertos']]['options']); $i++){
            echo '

            <button type="submit" class="btn btn-primary me-4" name="respuesta" 
            value='.str_replace(" ", "", $_SESSION['trivial'][$_SESSION['aciertos']]['options'][$i]).'> 

            '.$_SESSION['trivial'][$_SESSION['aciertos']]['options'][$i].'</button>
            
            ';
         }
      ?>
      </form>
      <div class="container"><?= $error ?></div>
   </section>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>