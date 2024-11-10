<?php
$arrayRojo = [1, 3, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36];
$numeroGanador = rand(0, 36);

echo ''. $_POST['tipoApuesta'].' '. $_POST['dinero'].' '. $_POST['queApuesta'].'';
// function cuantoGana() {}

if ($numeroGanador == 0) {
   $color = "verde";
} else if (in_array($numeroGanador, $arrayRojo)) {
   $color = "rojo";
} else {
   $color = "negro";
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
            <h5 class="card-title">El numero ganador es: <?= $numeroGanador ?>, que cae en el color <?= $color ?></h5>
            <p class="card-text">Ha apostado al numero 10</p>
            <p class="card-text">Ha ganado la barbara cantidad de 50€</p>
            <a href="#" class="btn btn-primary">Volver a la rule</a>
         </div>
         <div class="card-footer text-body-secondary">
            2 days ago
         </div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>