<?php
session_start();

if ($_SESSION["i"] == 3) {
   header("Location: felicidad.php");
}

var_dump($_SESSION['avatar']);

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

   <?php include_once 'includes/header.php'; ?>

   <section class="container">
      <form action="room1.php" method="post">
         <?php
         if ($_SESSION['dificultad'] == "easy") {
            include 'includes/facil.php';
         } else if ($_SESSION['dificultad'] == "medium") {
            include 'includes/medio.php';
         } else if ($_SESSION['dificultad'] == "hard") {
            include 'includes/dificil.php';
         }

         ?>
         <div class="col-12">
            <button class="btn btn-primary" type="submit" style="margin-top: 10px;">Enviar</button>
         </div>
      </form>
   </section>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>