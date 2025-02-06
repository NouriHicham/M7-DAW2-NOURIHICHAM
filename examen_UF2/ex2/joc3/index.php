<?php
   session_start();

   include_once 'Usuari.class.php';

   if(isset($_POST['nom'])){

      if (!isset($_SESSION['usuari'])) {
         $_SESSION['usuari'] = [];
      }

      $nuevo_usuario = new Usuari($_POST['nom'], $_POST['edad'], $_POST['mail']);
      if($nuevo_usuario->comprovarDades()){
         $_SESSION['usuari'][] = $nuevo_usuario;
         $_SESSION['usuari'] = serialize($_SESSION['usuari']);

         if (isset($_SESSION['usuari'])) {
            $usuari = unserialize($_SESSION['usuari']);
         }
      }else{
         echo '<h2>Introduzca los datos correctamente</h2>';
      }
   
   }

   
?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Formulario</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container mt-5">
   <h1>Formulari d'inscripció</h1>
   <form action="" method="post" class="mt-4">
      <label for="nom">Nom:</label>
      <input type="text" name="nom" required>
      <label for="preu">Edat:</label>
      <input type="text" name="edad" required>
      <label for="preu">Mail:</label>
      <input type="text" name="mail" required>
      <input type="submit" value="Afegir">
   </form>

   <button class="btn btn-secondary mt-3"><a href="logout.php" class="link-offset-2 link-underline link-underline-opacity-0 link-light">Reiniciar datos</a></button>
   <button class="btn btn-secondary mt-3"><a href="../../index.php" class="link-offset-2 link-underline link-underline-opacity-0 link-light">Inicio</a></button>

   <h3 class="mt-5">Usuarios registrados</h3>
   <?php
   
   if (isset($usuari) && !empty($usuari)) {
      foreach ($usuari as $usuario) {
         echo "<p>Nom: " . $usuario->nom . ", Edat: " . $usuario->edat . ", Mail: " . $usuario->correu . "</p>";
      }
   }
   ?>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>