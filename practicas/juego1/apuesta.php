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
            <h5 class="card-title">El numero ganador es: <?= $numeroGanador ?>, que cae en el color <span style="background-color: <?php if ($color == "verde") {
                                                                                                                                       echo "##32a852";
                                                                                                                                    } else if ($color == "rojo") {
                                                                                                                                       echo "#a83232";
                                                                                                                                    } else if ($color == "negro") {
                                                                                                                                       echo '##050505; color: "#FFFFFF";';
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
               <div class="col">
                  <form action="index.php" method="post">
                     <button type="submit" class="btn btn-success">Volver a apostar</button>
                  </form>
                  <!-- aqui puedes poner que guarde la info en la array ya iniciada en la sesion -->
               </div>
               <div class="col"><a href="logout.php" class="btn btn-danger">Cerrar sesión</a></div>
            </div>

         </div>
         <div class="card-footer text-body-secondary">
            2 days ago
         </div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>