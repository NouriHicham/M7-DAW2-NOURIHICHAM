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
</head>
<body>
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
</body>
</html>