<?php
include_once 'carta.class.php';
include_once 'baraja.class.php';
include_once 'partida.class.php';
include_once 'carta.class.php';
include_once 'jugador.class.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Juego del UNO</title>
</head>
<body>
   <div>
      <?php 
         $prueba = new Baraja(); 
         $prueba->crea_baraja();
         $prueba->mezcla();
         
         $pruebaPartida = new Partida(4, 8, $prueba->getBaraja());
         $pruebaPartida->jugar();
      ?>
   </div>
   
</body>
</html>