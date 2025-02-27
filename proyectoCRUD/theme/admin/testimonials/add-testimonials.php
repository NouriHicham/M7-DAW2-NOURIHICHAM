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
      $name = $_POST['name'];
      $surname = $_POST['surname'];
      $description = $_POST['description'];
      $photo = $_POST['photo'];
      $rating = $_POST['rating'];

      // preparar la consulta
      $stmt = $mysqli->prepare("INSERT INTO TESTIMONIALS (name, surname, description, photo, rating) VALUES (?,?,?,?,?)");

      // ligar los parámetros y ejecutar la consulta
      $stmt->bind_param("sssss", $name, $surname, $description, $photo, $rating);

      // ejecutar la consulta
      if($stmt->execute()){
         echo '<p>Testimonio añadido correctamente.</p>';
      } else {
         // mostrar un mensaje de error
         echo '<p>Error al añadir el testimonio: '. $stmt->error.'</p>';
      }
   }

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Formulario add testimonio</title>
</head>
<body>
   <h1>Formulario add testimonio</h1>

   <form action="" method="post">
      <label for="name">Nombre:</label><br>
      <input type="text" id="name" name="name" required><br>

      <label for="surname">Apellido:</label><br>
      <input type="text" id="surname" name="surname" required><br>

      <label for="description">Descripción:</label><br>
      <textarea id="description" name="description" rows="4" required></textarea><br>

      <label for="photo">Foto:</label><br>
      <input type="url" id="photo" name="photo" required><br>

      <label for="rating">Puntuación:</label><br>
      <input type="number" id="rating" name="rating" min="1" max="5" required><br>

      <input type="submit" value="Añadir testimonio">
   </form>

</body>
</body>
</html>