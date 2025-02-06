<?php
   session_start();

   include 'JocAdivinacio.class.php';

   if (!isset($_SESSION['juego'])) {
      $_SESSION['juego'] = serialize(new JocAdivinacio());
   }

   $juego = unserialize($_SESSION['juego']);

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Adivina el numero</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container mt-5">
   <?php
      if (!isset($_POST['numero'])) {
         echo '
            <h1>Adivina el numero</h1>
            <form action="" method="post">
               <label for="numero">Introduce un numero entre 1 y 20:</label>
               <input type="number" name="numero" min="1" max="20" required>
               <input type="submit" value="Comprobar">
            </form>';
      }else{
         if ($juego->comprobar($_POST['numero'])) {
            echo "<h2>Has acertado!</h2>";
            echo "<p>El numero era ".$juego->numero."</p>";
            echo "<p>Intentos: ".$juego->intentos."</p>";
            unset($_SESSION['juego']);
         }else {
            echo '<h1>Adivina el numero</h1>
                  <form action="" method="post">
                     <label for="numero">Introduce un numero entre 1 y 20:</label>
                     <input type="number" name="numero" min="1" max="20" required>
                     <input type="submit" value="Comprobar">
                  </form>';

            echo "<p>Intentos: ".$juego->intentos."</p>";
            echo "<h2>Has fallado!</h2>";
         }
      }
      $_SESSION['juego'] = serialize($juego);
   ?>
   <button class="btn btn-secondary mt-3"><a href="logout.php" class="link-offset-2 link-underline link-underline-opacity-0 link-light">Reiniciar juego</a></button>
   <button class="btn btn-secondary mt-3"><a href="../../index.php" class="link-offset-2 link-underline link-underline-opacity-0 link-light">Inicio</a></button>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>