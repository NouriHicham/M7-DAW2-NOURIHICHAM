<?php
   session_start();
   include_once 'Factura.class.php';

   if(!isset($_SESSION['facturas'])){
      $_SESSION['facturas'] = [];

      $factura1 = new Factura("Jose", "peras", rand(2,9), rand(1,3));
      $factura2 = new Factura("Maria", "manzanas", rand(5,10), rand(1,5));
      $factura3 = new Factura("Emilio", "litronas", rand(2,10), rand(10,500));
      $factura4 = new Factura("Torres", "butanos", rand(1,3), rand(1,5));
      $factura5 = new Factura("Manolo", "telefericos", rand(1,2), rand(100,1000));

      $_SESSION['facturas'][] = $factura1;
      $_SESSION['facturas'][] = $factura2;
      $_SESSION['facturas'][] = $factura3;
      $_SESSION['facturas'][] = $factura4;
      $_SESSION['facturas'][] = $factura5;

      $_SESSION['facturas'] = serialize($_SESSION['facturas']);

      
   }

   if (isset($_SESSION['facturas'])) {
      $facturas = unserialize($_SESSION['facturas']);
   }

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Facturas</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container">
   <table class="table">
   <thead>
      <tr>
         <th scope="col">Cliente</th>
         <th scope="col">Producte</th>
         <th scope="col">Quantitat</th>
         <th scope="col">Preu unitari</th>
         <th scope="col">Preu total</th>
      </tr>
   </thead>
   <tbody>
      <?php
         foreach ($facturas as $index => $factura) {
            if($index == 4){
               echo "<tr>";
               echo "<th scope='row'>" . $factura->client . "</th>";
               echo "<td>" . $factura->producte . "</td>";
               echo "<td>" . $factura->quantitat . "</td>";
               echo "<td>" . $factura->preuUnitari . " €</td>";
               echo "<td>Descuento del 20%: " . $factura->aplicarDescompte(20) . " €</td>";
               echo "</tr>";
            }else{
               echo "<tr>";
               echo "<th scope='row'>" . $factura->client . "</th>";
               echo "<td>" . $factura->producte . "</td>";
               echo "<td>" . $factura->quantitat . "</td>";
               echo "<td>" . $factura->preuUnitari . " €</td>";
               echo "<td>" . $factura->calcularTotal() . " €</td>";
               echo "</tr>";
            }
         }
      ?>

   </tbody>
   </table>
   <button class="btn btn-secondary mt-3"><a href="logout.php" class="link-offset-2 link-underline link-underline-opacity-0 link-light">Reiniciar carrito</a></button>
   <button class="btn btn-secondary mt-3"><a href="../../index.php" class="link-offset-2 link-underline link-underline-opacity-0 link-light">Inicio</a></button>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>