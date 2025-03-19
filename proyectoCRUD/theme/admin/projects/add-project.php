<?php
   session_start();
   require_once '../../config.php';

   // comprobar si es administrador
   if($_SESSION['role']!= 'admin'){
      echo 'No tienes permisos para acceder a esta página';
      exit;
   }

   // comprobar si se ha enviado el formulario
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
      // recoger los datos del formulario
      $title = $_POST['title'];
      $description = $_POST['description'];
      $photo = $_POST['photo'];
      $url = $_POST['url'];

      // preparar la consulta
      $stmt = $mysqli->prepare("INSERT INTO PROJECTS (title, description, thumbnail, url) VALUES (?,?,?,?)");

      // ligar los parámetros y ejecutar la consulta
      $stmt->bind_param("ssss", $title, $description, $photo, $url);

      // ejecutar la consulta
      if($stmt->execute()){
         echo '<p>Proyecto añadido correctamente.</p>';
      } else {
         // mostrar un mensaje de error
         echo '<p>Error al añadir el proyecto: '. $stmt->error.'</p>';
      }
   }

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Formulario add project</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   <h1>Formulario add project</h1>

   <div class="container mt-5">
   <form action="" method="post">
      <label for="title">Título:</label><br>
      <input type="text" id="title" name="title" required><br>

      <label for="description">Descripción:</label><br>
      <textarea id="description" name="description" rows="4" required></textarea><br>

      <label for="photo">Foto:</label><br>
      <input type="url" id="photo" name="photo" required><br>

      <label for="url">URL:</label><br>
      <input type="url" id="url" name="url" required><br>

      <input type="submit" value="Añadir proyecto">
   </form>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</body>
</html>