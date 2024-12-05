<?php
session_start();
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $users = [
         ['user'=>'admin', 'pass'=>'1234', 'admin'=>'admin'],
         ['user'=>'player', 'pass'=>'5678', 'admin'=>'player'],
      ];
      foreach($users as $user){

         if($_POST['user'] == $user['user'] && $_POST['password'] == $user['pass']){
            $_SESSION['admin'] = $user['admin'];
            header('Location: index.php');
            exit;
         }else{
            $error = 'usuario incorrecto';
         }

      }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   <div class="section mt-5">
      <h2 class="text-center">Formulario para iniciar sesión</h2>
   </div>
   <section class="container">

      <form action="login.php" method="post">
      <!-- name input -->
      <div class="form-outline mb-4">
         <input type="text" id="user" class="form-control" name="user"/>
         <label class="form-label" for="user">Usuario</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
         <input type="password" id="form2Example2" class="form-control" name="password"/>
         <label class="form-label" for="form2Example2">Contraseña</label>
      </div>

      <div class="bg-danger">
         <?= $error ?>
      </div>

      <!-- Submit button -->
      <button  type="submit" class="btn btn-primary btn-block mb-4 mt-4">Iniciar sesión</button>
      </form>

   </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>