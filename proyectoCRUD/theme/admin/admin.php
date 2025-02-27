<?php
   session_start();
   require_once '../config.php';

   
   if(!isset($_SESSION['id']) || $_SESSION['role']!= 'admin'){
      header('Location: index.php');
      exit;
   }

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Panel de administrador</title>
</head>
<body>
   <h1>Panel de administrador</h1>

   <h2>Menu añadir</h2>
   <a href="./projects/add-project.php">Añadir proyecto</a>
   <a href="./testimonials/add-testimonials.php">Añadir testimonio</a>


   <h2>Listado de usuarios</h2>
   <table>
      <tr>
         <th>ID</th>
         <th>Nombre</th>
         <th>Apellido</th>
         <th>Correo Electrónico</th>
         <th>Edad</th>
         <th>Trabajo</th>
         <th>Acciones</th>
      </tr>

      <?php
         $users = $mysqli->query("SELECT * FROM USERS order by id asc")->fetch_all(MYSQLI_ASSOC);
         foreach($users as $user){
            echo "<tr>";
            echo "<td>".$user['id']."</td>";
            echo "<td>".$user['name']."</td>";
            echo "<td>".$user['lastname']."</td>";
            echo "<td>".$user['email']."</td>";
            echo "<td>".$user['age']."</td>";
            echo "<td>".$user['job']."</td>";
            echo "</tr>";
         }
      ?>

   </table>

   <h2>Listado de testimonios</h2>
   <table>
      <tr>
         <th>ID</th>
         <th>Nombre</th>
         <th>Apellido</th>
         <th>Descripción</th>
         <th>Foto</th>
         <th>Puntuación</th>
         <th>Acciones</th>
      </tr>

      <?php
         $testimonials = $mysqli->query("SELECT * FROM TESTIMONIALS order by id asc")->fetch_all(MYSQLI_ASSOC);
         foreach($testimonials as $testimonial){
            echo "<tr>";
            echo "<td>".$testimonial['id']."</td>";
            echo "<td>".$testimonial['name']."</td>";
            echo "<td>".$testimonial['surname']."</td>";
            echo "<td>".$testimonial['description']."</td>";
            echo "<td><img src='uploads/testimonials/".$testimonial['photo']."' alt='Foto testimonio'></td>";
            echo "<td>";
            for($i=1; $i<=$testimonial['rating']; $i++){
               echo '<span>⭐</span>';
            }
            echo "</td>";
            echo '<td> <span><a href="./testimonials/delete-testimonials.php?id='.$testimonial['id'].'" style="text-decoration: none;">🗑️</a></span> </td>';
            echo "</tr>";
         }
      ?>
   </table>

</body>
</html>