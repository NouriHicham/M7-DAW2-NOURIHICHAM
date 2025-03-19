<?php
   session_start();
   require_once '../../config.php';

   if(!isset($_GET['id'])){
      header('Location: ../admin.php');
      exit();
   }

   // corregir la asignacion de id
   $id = (int) $_GET['id'];

   $result=$mysqli->query("SELECT * FROM USERS where id = $id");

   $user = $result->fetch_assoc();

   // print_r($user);

   if($_SERVER['REQUEST_METHOD']=='POST'){
      $name = $_POST['name'];
      $surname = $_POST['surname'];
      $email = $_POST['email'];
      $age = $_POST['age'];
      $job = $_POST['job'];
      $role = $_POST['role'];

      $stmt = $mysqli->prepare("UPDATE USERS SET name=?, surname=?, email=?, age=?, job=?, role=? WHERE id=?");
      $stmt->bind_param("sssissi", $name, $surname, $email, $age, $job, $role, $id);

      if($stmt->execute()){
         header('Location: user.php');
         exit();
      }else{
         echo 'alert("Hubo un error al editar el usuario");';
         header('Location: editar.php?id='.$id);
         exit();
      }

   }
?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Editar Usuario</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   <div class="container mt-5">
      <h1>Editar Usuario</h1>
      <form action="" method="post">
         <label for="name">Nombre:</label><br>
         <input type="text" id="name" name="name" value="<?php echo $user['name']?>"><br>

         <label for="surname">Apellido:</label><br>
         <input type="text" id="surname" name="surname" value="<?php echo $user['surname']?>"><br>

         <label for="email">Correo Electrónico:</label><br>
         <input type="email" id="email" name="email" value="<?php echo $user['email']?>"><br>

         <label for="age">Edad:</label><br>
         <input type="number" id="age" name="age" value="<?php echo $user['age']?>"><br>

         <label for="job">Profesión:</label><br>
         <input type="text" id="job" name="job" value="<?php echo $user['job']?>"><br>

         <label for="role">Rol:</label><br>
         <select id="role" name="role">
            <option value="admin" <?php echo ($user['role']=='admin'?'selected':'')?>>Administrador</option>
            <option value="user" <?php echo ($user['role']=='user'?'selected':'')?>>Usuario</option>
         </select><br>
         <input type="submit" value="Actualizar">
         
         <a href="../../index.php">Volver al inicio</a>
      </form>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>