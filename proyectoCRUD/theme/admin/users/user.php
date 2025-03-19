<?php
   session_start();
   require_once '../../config.php';

   // comprobar si es administrador
   if($_SESSION['role']!= 'admin'){
      header('Location: ../../index.php');
      exit;
   }

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Usuarios</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container mt-5">
   <a href="../admin.php" class="btn btn-secondary">Volver</a>
   <h1>Listado de Usuarios</h1>
   <table class="table mx-4">
      <thead>
         <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Correo Electrónico</th>
            <th scope="col">Edad</th>
            <th scope="col">Trabajo</th>
            <th scope="col">Rol</th>
            <th scope="col" colspan="2">Acciones</th>
         </tr>
      </thead>
      <tbody>
         <?php
            $users = $mysqli->query("SELECT * FROM USERS order by id asc")->fetch_all(MYSQLI_ASSOC);
            foreach($users as $user){
               echo '<tr style="line-height: 16px;">';
               echo "<td scope='row'>".$user['id']."</td>";
               echo "<td>".$user['name']."</td>";
               echo "<td>".$user['surname']."</td>";
               echo "<td>".$user['email']."</td>";
               echo "<td>".$user['age']."</td>";
               echo "<td>".$user['job']."</td>";
               echo "<td>".$user['role']."</td>";
               echo '<td><a href="delete-user.php?id='.$user['id'].'" class="btn btn-light" style="text-decoration: none;">🗑️</a></td>';
               echo '<td><a href="edit-user.php?id='.$user['id'].'" class="btn btn-light" style="text-decoration: none;">🖊️</a></td>';
               echo "</tr>";
            }
         ?>
      </tbody>
   </table>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>