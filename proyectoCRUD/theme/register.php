<?php
   session_start();
   include_once 'config.php';
   

   //comprobar si el formulario ya se ha enviado
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
      //recoger los datos del formulario
      $username = $_POST['username'];
      $surname = $_POST['surname'];
      $avatar = $_POST['avatar'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $age = $_POST['age'];
      $job = $_POST['job'];

      //cifrar la contraseña con password_hash()
      $passwordHash = password_hash($password, PASSWORD_DEFAULT);

      //preparar la consulta SQL para evitar SQL Injection
      $stmt = $mysqli->prepare("INSERT INTO USERS (name, surname, avatar, email, password, role, age, job, date_register) VALUES (?,?,?,?,?,'user',?,?,NOW())");

      //comprovar que la preparación ha sido exitosa
      if(!$stmt){
         die('Error de preparación: '. $mysqli->error);
      }

      //bindear los parametros
      $stmt->bind_param("sssssis", $username, $surname, $avatar, $email, $passwordHash, $age, $job);

      //ejecutar la consulta
      if($stmt->execute()){
         //mostrar un mensaje de confirmación
         echo '<p>Registro exitoso. Te has iniciado sesión automáticamente.</p>';
      } else {
         //mostrar un mensaje de error
         echo '<p>Error al registrar: '. $stmt->error.'</p>';
      }

      //cerrar la conexión
      $stmt->close();
      $mysqli->close();

      
   }

   //mostrar los datos del último registro realizado
   // $ultimoregister = $mysqli->query("SELECT * FROM USERS ORDER BY id DESC LIMIT 1;")->fetch_all(MYSQLI_ASSOC);
   // print_r($ultimoregister);

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registro</title>
</head>
<body>
   <h1>Registro</h1>
   <form action="" method="post">
      <label for="username">Nombre:</label><br>
      <input type="text" id="username" name="username" required><br>

      <label for=surname">Apellido:</label><br>
      <input type="text" id="surname" name="surname" required><br>

      <label for="avatar">Avatar:</label><br>
      <input type="url" id="avatar" name="avatar" required><br>

      <label for="email">Correo Electrónico:</label><br>
      <input type="email" id="email" name="email" required><br>

      <label for="age">Edad:</label><br>
      <input type="number" id="age" name="age" required><br>

      <label for="job">Trabajo:</label><br>
      <input type="text" id="job" name="job" required><br>

      <label for="password">Contraseña:</label><br>
      <input type="password" id="password" name="password" required><br>

      <input type="submit" value="Registrarse">
   </form>
</body>
</html>