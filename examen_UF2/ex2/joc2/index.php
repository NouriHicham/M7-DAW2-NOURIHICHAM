<?php
   session_start();

   include_once 'CarretCompra.class.php';

   if(!isset($_SESSION['carret'])){
      $_SESSION['carret'] = serialize(new CarretCompra());
   }

   $carret = unserialize($_SESSION['carret']);

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>El carrito</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container">
   
   <h1>El carrito</h1>
   <form action="" method="post">
      <label for="nom">Nom:</label>
      <input type="text" name="nom">
      <label for="preu">Preu:</label>
      <input type="number" name="preu">
      <input type="submit" value="Afegir">
   </form>
      <?php
         if(isset($_POST['nom']) && isset($_POST['preu'])){
            $carret->afegirProducte($_POST['nom'], intval($_POST['preu']));
         }

         echo '
            <h2>Productes</h2>
            <table class="table">
            <thead>
               <tr>
                  <th scope="col">Productes</th>
                  <th scope="col">Preu</th>
               </tr>
            </thead>
            <tbody>
         ';
         $carret->mostrarProductes();

         echo '<p>Total: ' . $carret->total() . '</p>';
         
         $_SESSION['carret'] = serialize($carret);
      ?>
      </tbody>
      </table>
      <button class="btn btn-secondary mt-3"><a href="logout.php" class="link-offset-2 link-underline link-underline-opacity-0 link-light">Reiniciar carrito</a></button>
      <button class="btn btn-secondary mt-3"><a href="../../index.php" class="link-offset-2 link-underline link-underline-opacity-0 link-light">Inicio</a></button>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>