<?php
$arrayRojo = [1, 3, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36];
$numeroGanador = rand(0, 36);

$tipoApuesta = $_POST['tipoApuesta']; 
$dinero = $_POST['dinero']; 
$queApuesta = $_POST['queApuesta'];
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
      if($queApuesta=="docena1" && ($numeroGanador > 0 || $numeroGanador < 13)){
         $dineroGanado = $dinero * 2;
      }else if($queApuesta == "docena2" && ($numeroGanador > 12 || $numeroGanador < 25)){
         $dineroGanado = $dinero * 2;
      }else if($queApuesta == "docena3" && $numeroGanador > 24){
         $dineroGanado = $dinero * 2;
      }
      break;
   case "Columna":
      if($queApuesta=="columna1" && ($numeroGanador==1 || $numeroGanador==4 || $numeroGanador ==7 || $numeroGanador ==10 || $numeroGanador ==13 || $numeroGanador ==16 || $numeroGanador ==19 || $numeroGanador ==22 || $numeroGanador ==25 || $numeroGanador ==28 || $numeroGanador ==31 || $numeroGanador == 34)){
         $dineroGanado = $dinero * 2;
      }else if($queApuesta=="columna2" && ($numeroGanador==2 || $numeroGanador==5 || $numeroGanador==8 || $numeroGanador==11 || $numeroGanador==14 || $numeroGanador==17 || $numeroGanador==20 || $numeroGanador==23 || $numeroGanador==26 || $numeroGanador==29 || $numeroGanador==32 || $numeroGanador==35)){
         $dineroGanado = $dinero * 2;
      }else if($queApuesta=="columna3" && ($numeroGanador==3 || $numeroGanador==6 || $numeroGanador==9 || $numeroGanador==12 || $numeroGanador==15 || $numeroGanador==18 || $numeroGanador==21 || $numeroGanador==24 || $numeroGanador==27 || $numeroGanador==30 || $numeroGanador==33 || $numeroGanador==36)){
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
      if($queApuesta== "dosColumnes1" && ($numeroGanador==1 || $numeroGanador==2 || $numeroGanador==4 || $numeroGanador==5 || $numeroGanador==7 || $numeroGanador==8 || $numeroGanador==10 || $numeroGanador==11 || $numeroGanador==13 || $numeroGanador==14 || $numeroGanador==16 || $numeroGanador==17 || $numeroGanador==19 || $numeroGanador==20 || $numeroGanador==22 || $numeroGanador==23 || $numeroGanador==25 || $numeroGanador==26 || $numeroGanador==28 || $numeroGanador==29 || $numeroGanador==31 || $numeroGanador==32 || $numeroGanador==34 || $numeroGanador==35)){
         $dineroGanado = $dinero * 0.5;
      }else if($queApuesta=="dosColumnes2" && ($numeroGanador==2 || $numeroGanador==3 || $numeroGanador==5 || $numeroGanador==6 || $numeroGanador==8 || $numeroGanador==9 || $numeroGanador==11 || $numeroGanador==12 || $numeroGanador==14 || $numeroGanador==15 || $numeroGanador==17 || $numeroGanador==18 || $numeroGanador==20 || $numeroGanador==21 || $numeroGanador==23 || $numeroGanador==24 || $numeroGanador==26 || $numeroGanador==27 || $numeroGanador==29 || $numeroGanador==30 || $numeroGanador==32 || $numeroGanador==33 || $numeroGanador==35 || $numeroGanador==36)){
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
   case "Transversal":
   case "Caballo":
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