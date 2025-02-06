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
</head>
<body>
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
   <button style="margin-top: 10px"><a href="logout.php">Reiniciar juego</a></button>
</body>
</html>