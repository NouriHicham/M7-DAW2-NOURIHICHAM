<?php
   session_start();
   include_once 'data.php';

   if(!isset($_SESSION['admin'])){
      header('Location: login.php');
      exit;
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Bienvenida al trivial</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   <nav class="navbar bg-body-tertiary">
   <div class="container d-flex justify-content-between">
      <?php
         if($_SESSION['admin']=='admin'){
            echo '<a class="navbar-brand h6" href="manage.php">Administrar preguntas⚙️</a>';
         }else{
            echo '<a class="navbar-brand h6" href="login.php">Login⚙️</a>';
         }
      ?>
      <a href="logout.php"><button type="button" class="btn btn-danger">cerrar sesión</button></a>
   </div>
   </nav>
   <section class="container">
      <h2 class="mt-4">Bienvenida al trivial</h2>
      <a href="trivial.php"><button type="button" class="btn btn-primary mt-4">Iniciar trivial</button></a>
   </section>
   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>