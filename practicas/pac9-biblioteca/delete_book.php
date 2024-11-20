<?php
session_start();

include_once 'includes/libreria.php';
include_once 'includes/funcionLibros.php';

// Verifica si el usuario es admin; si no, directo al lobby.
if ($_SESSION['rol'] != "admin") {
   header('Location: home.php');
}

if(isset($_GET['eliminar'])){
   eliminarLibro($_GET['eliminar']);
   header('Location: home.php');
   exit;
}
   
?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Biblioteca Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
   <!-- Encabezado del formulario -->
   <header class="bg-light py-3 mb-4 shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">
            <div>
                <h4 class="m-0">👋 Bienvenido, <?= $_SESSION['user'] ?></h4>
                <p class="text-muted m-0"><i class="fas fa-user-shield text-success"></i> <?= $_SESSION['rol'] ?></p>
            </div>
            <a href="home.php" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Volver a la Biblioteca
            </a>
        </div>
    </header>

   <div class="container">
   <?php
      echo '
         <div class="col">
            <div class="card h-100 shadow-sm">
            <img src="'.$_SESSION['libros'][$_GET['id']]["imagen"].'" class="card-img-top" alt="" style="height: 400px; object-fit: cover;">
            <div class="card-body">
            <h5 class="card-title">'.$_SESSION['libros'][$_GET['id']]["titulo"].'</h5>
            <p class="card-text"><strong>Autor: </strong>'.$_SESSION['libros'][$_GET['id']]["autor"].'</p>
            <p class="card-text">'.$_SESSION['libros'][$_GET['id']]["descripcion"].'</p>
            </div>
            </div>
         </div>
         <div class="mt-2 row container">
            <a href="delete_book.php?eliminar='.$_GET['id'].'" class="btn btn-primary">Quiere borrar este libro?</a> 
            <a href="home.php" class="mt-2 btn btn-danger">Me arrepiento</a>
         </div>
      ';
   ?>

   <?php //var_dump($_GET); ?>
   </div>
</body>
</html>