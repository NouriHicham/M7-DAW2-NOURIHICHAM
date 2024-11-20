<?php
session_start();

include_once 'includes/libreria.php';
include_once 'includes/funcionLibros.php';

if(isset($_GET['id'])){
   if($_GET['id'] == -1){
      agregarLibro($_GET['titulo'],$_GET['autor'],$_GET['imagen'],$_GET['descripcion']);
      header('Location: home.php');
      exit;
   }else if($_GET['id'] >= 0){
      editarLibro($_GET['id'],$_GET['titulo'],$_GET['autor'],$_GET['imagen'],$_GET['descripcion']);
      header('Location: home.php');
      exit;
   }
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
   if(empty($_POST['anadir'])){
      echo '
         <div class="col">
            <div class="card h-100 shadow-sm">
            <img src="'.$_POST['imagen'].'" class="card-img-top" alt="" style="height: 400px; object-fit: cover;">
            <div class="card-body">
            <h5 class="card-title">'.$_POST['titulo'].'</h5>
            <p class="card-text"><strong>Autor: </strong>'.$_POST['autor'].'</p>
            <p class="card-text">'.$_POST['descripcion'].'</p>
            </div>
            </div>
         </div>
         <div class="mt-2 row container">
            <a href="confirmacion.php?titulo='.$_POST['titulo'].'&autor='.$_POST['autor'].'&descripcion='.$_POST['descripcion'].'&imagen='.$_POST['imagen'].'&id=-1" class="btn btn-primary">Confirma añadir este libro?</a> 
            <a href="home.php" class="mt-2 btn btn-danger">Me arrepiento</a>
         </div>
      ';
   }else if(isset($_POST['editar'])){
      echo '
         <div class="col">
            <div class="card h-100 shadow-sm">
            <img src="'.$_SESSION['libros'][$_POST['id']]["imagen"].'" class="card-img-top" alt="" style="height: 400px; object-fit: cover;">
            <div class="card-body">
            <h5 class="card-title">'.$_SESSION['libros'][$_POST['id']]["titulo"].'</h5>
            <p class="card-text"><strong>Autor: </strong>'.$_SESSION['libros'][$_POST['id']]["autor"].'</p>
            <p class="card-text">'.$_SESSION['libros'][$_POST['id']]["descripcion"].'</p>
            </div>
            </div>
         </div>
      ';
      echo '
         <div class="col">
            <div class="card h-100 shadow-sm">
            <img src="'.$_POST['imagen'].'" class="card-img-top" alt="" style="height: 400px; object-fit: cover;">
            <div class="card-body">
            <h5 class="card-title">'.$_POST['titulo'].'</h5>
            <p class="card-text"><strong>Autor: </strong>'.$_POST['autor'].'</p>
            <p class="card-text">'.$_POST['descripcion'].'</p>
            </div>
            </div>
         </div>
      ';
      echo '
         <div class="container">
            <a href="confirmacion.php?titulo='.$_POST['titulo'].'&autor='.$_POST['autor'].'&descripcion='.$_POST['descripcion'].'&imagen='.$_POST['imagen'].'&id='.$_POST['id'].'" class="mt-2 mb-2 row btn btn-primary">Confirma editar el primer libro por el segundo?</a> 
            <a href="home.php" class="row btn btn-danger">Me arrepiento</a>
         </div>
      ';
   }
   ?>

   <?php var_dump($_GET); ?>
   </div>
</body>
</html>