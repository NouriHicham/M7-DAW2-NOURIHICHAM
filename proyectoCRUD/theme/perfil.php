<?php
   session_start();
   require_once 'config.php';

   if(!isset($_SESSION['id'])){
      header('Location: index.php');
      exit;
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Su perfil <?=  $_SESSION['name']?></title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   <div class="container mt-5">
   <?php
      echo '<h2>Bienvenido '. $_SESSION['name'].' '. $_SESSION['surname']. '</h2>';
      echo '<p>Correo electrónico: '. $_SESSION['email']. '</p>';
      echo '<p>Edad: '. $_SESSION['age']. '</p>';
      echo '<p>Trabajo: '. $_SESSION['job']. '</p>';

      if($_SESSION['role'] == 'admin'){
         echo '<p>Rol: Administrador</p>';
      } else {
         echo '<p>Rol: Usuario</p>';
      }
   ?>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>