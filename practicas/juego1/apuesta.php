<?php
$arrayRojo = [1, 3, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36];
$numeroGanador = rand(0, 36);

$tipoApuesta = $_POST['tipoApuesta']; 
$dinero = $_POST['dinero']; 
$queApuesta = $_POST['queApuesta'];
$queApuesta2 = $_POST['queApuesta2'];

$dineroGanado = 0;

if ($numeroGanador == 0) {
   $color = "verde";
} else if (in_array($numeroGanador, $arrayRojo)) {
   $color = "rojo";
} else {
   $color = "negro";
}

switch ($tipoApuesta) {
   case "Roig/Negre":
      if($queApuesta==$color){
         $dineroGanado = $dinero;
      }
   break;
   case "Parell/Imparell":
      if($queApuesta=="par" && $numeroGanador%2==0){
         $dineroGanado = $dinero;
      }else if($queApuesta == "impar" && $numeroGanador % 2 != 0){
         $dineroGanado = $dinero;
      }
   break;
   case "Pasa/Falta":
      if($queApuesta=="falta" && $numeroGanador<=18){
         $dineroGanado = $dinero;
      }else if($queApuesta == "pasa" && $numeroGanador > 18){
         $dineroGanado = $dinero;
      }
   break;
   case "Pleno":
      if($numeroGanador==$queApuesta){
         $dineroGanado = $dinero * 35;
      }
      break;
   case "Docena":
      if (($queApuesta == "docena1" && in_array($numeroGanador, range(1, 12))) || ($queApuesta == "docena2" && in_array($numeroGanador, range(13, 24))) || ($queApuesta == "docena3" && in_array($numeroGanador, range(25, 36)))) {
         $dineroGanado = $dinero * 2;
      }
      break;
   case "Columna":
      if (($queApuesta == "columna1" && in_array($numeroGanador, [1, 4, 7, 10, 13, 16, 19, 22, 25, 28, 31, 34])) || ($queApuesta == "columna2" && in_array($numeroGanador, [2, 5, 8, 11, 14, 17, 20, 23, 26, 29, 32, 35])) || ($queApuesta == "columna3" && in_array($numeroGanador, [3, 6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36]))) {
         $dineroGanado = $dinero * 2;
      }
      break;
   case "Dos docenes":
      if($queApuesta== "dosDocenas1" && ($numeroGanador>0 || $numeroGanador<25)){
         $dineroGanado = $dinero * 0.5;
      } else if ($queApuesta == "dosDocenas2" && ($numeroGanador > 12 || $numeroGanador < 37)) {
         $dineroGanado = $dinero * 0.5;
      } else if ($queApuesta == "dosDocenas3" && (($numeroGanador > 0 || $numeroGanador < 13)|| ($numeroGanador > 24 || $numeroGanador < 37))) {
         $dineroGanado = $dinero * 0.5;
      }
      break;
   case "Dos columnes":
      if($queApuesta== "dosColumnes1" && in_array($numeroGanador, [1,2,4,5,7,8,10,11,13,14,16,17,19,20,22,23,25,26,28,29,31,32,34,35])){
         $dineroGanado = $dinero * 0.5;
      }else if($queApuesta=="dosColumnes2" && in_array($numeroGanador, [2,3,5,6,8,9,11,12,14,15,17,18,20,21,23,24,26,27,29,30,32,33,35,36])){
         $dineroGanado = $dinero * 0.5;
      }
   break;
   case "Seisena":
      if ($queApuesta == "seisena1" && in_array($numeroGanador, [1, 2, 3, 4, 5, 6])) {
         $dineroGanado = $dinero * 5;
      } else if ($queApuesta == "seisena2" && in_array($numeroGanador, [4, 5, 6, 7, 8, 9])) {
         $dineroGanado = $dinero * 5;
      } else if ($queApuesta == "seisena3" && in_array($numeroGanador, [7, 8, 9, 10, 11, 12])) {
         $dineroGanado = $dinero * 5;
      } else if ($queApuesta == "seisena4" && in_array($numeroGanador, [10, 11, 12, 13, 14, 15])) {
         $dineroGanado = $dinero * 5;
      } else if ($queApuesta == "seisena5" && in_array($numeroGanador, [13, 14, 15, 16, 17, 18])) {
         $dineroGanado = $dinero * 5;
      } else if ($queApuesta == "seisena6" && in_array($numeroGanador, [16, 17, 18, 19, 20, 21])) {
         $dineroGanado = $dinero * 5;
      } else if ($queApuesta == "seisena7" && in_array($numeroGanador, [19, 20, 21, 22, 23, 24])) {
         $dineroGanado = $dinero * 5;
      } else if ($queApuesta == "seisena8" && in_array($numeroGanador, [22, 23, 24, 25, 26, 27])) {
         $dineroGanado = $dinero * 5;
      } else if ($queApuesta == "seisena9" && in_array($numeroGanador, [25, 26, 27, 28, 29, 30])) {
         $dineroGanado = $dinero * 5;
      } else if ($queApuesta == "seisena10" && in_array($numeroGanador, [28, 29, 30, 31, 32, 33])) {
         $dineroGanado = $dinero * 5;
      } else if ($queApuesta == "seisena11" && in_array($numeroGanador, [31, 32, 33, 34, 35, 36])) {
         $dineroGanado = $dinero * 5;
      }
      break;
   case "Cuadro":
      if ($queApuesta == "cuadro1" && in_array($numeroGanador, [1, 2, 4, 5])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro2" && in_array($numeroGanador, [2, 3, 5, 6])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro3" && in_array($numeroGanador, [4, 5, 7, 8])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro4" && in_array($numeroGanador, [5, 6, 8, 9])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro5" && in_array($numeroGanador, [7, 8, 10, 11])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro6" && in_array($numeroGanador, [8, 9, 11, 12])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro7" && in_array($numeroGanador, [10, 11, 13, 14])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro8" && in_array($numeroGanador, [11, 12, 14, 15])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro9" && in_array($numeroGanador, [13, 14, 16, 17])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro10" && in_array($numeroGanador, [14, 15, 17, 18])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro11" && in_array($numeroGanador, [16, 17, 19, 20])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro12" && in_array($numeroGanador, [17, 18, 20, 21])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro13" && in_array($numeroGanador, [19, 20, 22, 23])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro14" && in_array($numeroGanador, [20, 21, 23, 24])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro15" && in_array($numeroGanador, [22, 23, 25, 26])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro16" && in_array($numeroGanador, [23, 24, 26, 27])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro17" && in_array($numeroGanador, [25, 26, 28, 29])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro18" && in_array($numeroGanador, [26, 27, 29, 30])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro19" && in_array($numeroGanador, [28, 29, 31, 32])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro20" && in_array($numeroGanador, [29, 30, 32, 33])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro21" && in_array($numeroGanador, [31, 32, 34, 35])) {
         $dineroGanado = $dinero * 8;
      } else if ($queApuesta == "cuadro22" && in_array($numeroGanador, [32, 33, 35, 36])) {
         $dineroGanado = $dinero * 8;
      }
      break;
   case "Transversal":
      if ($queApuesta == "transversal1" && in_array($numeroGanador, [0, 1, 2])) {
         $dineroGanado = $dinero * 11;
      } else if ($queApuesta == "transversal2" && in_array($numeroGanador, [0, 2, 3])) {
         $dineroGanado = $dinero * 11;
      } else if ($queApuesta == "transversal3" && in_array($numeroGanador, range(1, 3))) {
         $dineroGanado = $dinero * 11;
      } else if ($queApuesta == "transversal4" && in_array($numeroGanador, range(4, 6))) {
         $dineroGanado = $dinero * 11;
      } else if ($queApuesta == "transversal5" && in_array($numeroGanador, range(7, 9))) {
         $dineroGanado = $dinero * 11;
      } else if ($queApuesta == "transversal6" && in_array($numeroGanador, range(10, 12))) {
         $dineroGanado = $dinero * 11;
      } else if ($queApuesta == "transversal7" && in_array($numeroGanador, range(13, 15))) {
         $dineroGanado = $dinero * 11;
      } else if ($queApuesta == "transversal8" && in_array($numeroGanador, range(16, 18))) {
         $dineroGanado = $dinero * 11;
      } else if ($queApuesta == "transversal9" && in_array($numeroGanador, range(19, 21))) {
         $dineroGanado = $dinero * 11;
      } else if ($queApuesta == "transversal10" && in_array($numeroGanador, range(22, 24))) {
         $dineroGanado = $dinero * 11;
      } else if ($queApuesta == "transversal11" && in_array($numeroGanador, range(25, 27))) {
         $dineroGanado = $dinero * 11;
      } else if ($queApuesta == "transversal12" && in_array($numeroGanador, range(28, 30))) {
         $dineroGanado = $dinero * 11;
      } else if ($queApuesta == "transversal13" && in_array($numeroGanador, range(31, 33))) {
         $dineroGanado = $dinero * 11;
      } else if ($queApuesta == "transversal14" && in_array($numeroGanador, range(34, 36))) {
         $dineroGanado = $dinero * 11;
      }
      break;
   case "Caballo":
      if($numeroGanador == ($queApuesta || $queApuesta2)){
         $dineroGanado = $dinero * 17;
      }
      break;
   default:
      break;
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
            <a href="index.php" class="btn btn-primary">Volver a la rule</a>
         </div>
         <div class="card-footer text-body-secondary">
            2 days ago
         </div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>