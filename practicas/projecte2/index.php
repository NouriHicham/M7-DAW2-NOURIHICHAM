<?php
include_once 'carta.class.php';
include_once 'baraja.class.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <div>
      <?php 
         $prueba = new Baraja(); 
         $prueba->crea_baraja();
         $prueba->mezcla();
         $prueba->pinta_baraja();
      ?>
   </div>
   
</body>
</html>