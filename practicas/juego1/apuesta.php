<?php
session_start();
$arrayRojo = [1, 3, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36];
$numeroGanador = rand(0, 36);

$tipoApuesta = isset($_POST['tipoApuesta']) ? $_POST['tipoApuesta'] : null;
$dinero = isset($_POST['dinero']) ? $_POST['dinero'] : 0;
$queApuesta = isset($_POST['queApuesta']) ? $_POST['queApuesta'] : null;
$queApuesta2 = isset($_POST['queApuesta2']) ? $_POST['queApuesta2'] : null;

$dineroGanado = 0;

if ($numeroGanador == 0) {
   $color = "verde";
} else if (in_array($numeroGanador, $arrayRojo)) {
   $color = "rojo";
} else {
   $color = "negro";
}

include_once 'includes/casos_apuestas.php';


if(!isset($_SESSION['dineroGanado'])){
   $_SESSION['dineroGanado'] = [];
   $_SESSION['tipoApuesta'] = [];
   $_SESSION['dineroApostado'] = [];
}else{
   array_push($_SESSION['dineroGanado'], $dineroGanado);
   array_push($_SESSION['tipoApuesta'], $tipoApuesta);
   array_push($_SESSION['dineroApostado'], $dinero);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ganaste?</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
   <div class="container mt-5">
      <div class="card text-center">
         <div class="card-header">
            La rule
         </div>
         <div class="card-body">
            <h5 class="card-title">El numero ganador es: <?= $numeroGanador ?>, que cae en el color <span style="background-color: <?php 
            if ($color == "verde") {
               echo "#32a852";
            } else if ($color == "rojo") {
               echo "#a83232";
            } else if ($color == "negro") {
               echo '#050505; color: #ffffff;';
            } ?>;"><?= $color ?></span></h5>
            <?php
            if (is_numeric($queApuesta)) {
               echo '<p class="card-text">Ha apostado al numero ' . $queApuesta . ' </p>';
            } else {
               echo '<p class="card-text">Ha apostado algo raro</p>';
            }
            ?>

            <p class="card-text">Ha ganado la barbara cantidad de <?= '' . $dineroGanado . '' ?></p>
            <div class="row">
               <div class="col"><a href="index.php" class="btn btn-success">Volver a apostar</a></div>
               <div class="col"><a href="logout.php" class="btn btn-danger">Cerrar sesión</a></div>
            </div>

         </div>
         <div class="card-footer text-body-secondary">
         <p class="d-inline-flex gap-1">
            <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Tabla de apuestas
            </button>
         </p>
         <div class="collapse" id="collapseExample">
            <div class="card border-0">
            <table class="table">
               <thead>
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">Dinero apostado</th>
                     <th scope="col">Dinero ganado</th>
                     <th scope="col">Tipo de apuesta</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  for($i=0;$i<count($_SESSION['dineroGanado']);$i++){
                     echo '
                        <tr>
                           <th scope="row">'.$i.'</th>
                           <td>'.$_SESSION['dineroGanado'][$i].'</td>
                           <td>'.$_SESSION['dineroApostado'][$i].'</td>
                           <td>'.$_SESSION['tipoApuesta'][$i].'</td>
                        </tr>
                     ';
                  }
                  ?>
               </tbody>
            </div>
        </div>
         </div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>