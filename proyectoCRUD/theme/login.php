<?php
   session_start();
   require_once 'config.php';

   //comprobar si se ha iniciado sesión
   if($_SERVER['REQUEST_METHOD']==='POST'){
      //guardar los datos del formulario en variables
      $email = $_POST['email'];
      $password = $_POST['password'];
      

      //ejecutar la consulta
      $result = $mysqli->query("SELECT * FROM USERS WHERE email = '$email'");
     
      //comprobar si hay resultados
      if($result && $result->num_rows > 0){
         $user = $result->fetch_assoc();

         //comprobar la contraseña es correcta
         if(password_verify($password, $user['password'])){
            //iniciar sesión
            $_SESSION['username'] = $user['name'];
            $_SESSION['surname'] = $user['surname'];
            $_SESSION['age'] = $user['age'];
            $_SESSION['job'] = $user['job'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['avatar'] = $user['avatar'];
            $_SESSION['email'] = $user['email'];
            

            header('Location: index.php');
            exit;
         } else {
            //mostrar error de contraseña incorrecta
            echo '<script>alert("Contraseña incorrecta.");</script>';

         }
      }else {
         //mostrar error de usuario no encontrado
         echo '<script>alert("Usuario no encontrado.");</script>';
      }

   }
?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Iniciar sesion</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   <div class="container mt-5">
   <h1>Iniciar Sesión</h1>
   <form action="" method="POST">
      <label for="email">Correo Electrónico:</label><br>
      <input type="email" id="email" name="email" required><br>

      <label for="password">Contraseña:</label><br>
      <input type="password" id="password" name="password" required><br>
      <p><a href="register.php">Crear una cuenta</a></p>

      <input type="submit" value="Iniciar Sesión">
   </form>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</body>
</html>