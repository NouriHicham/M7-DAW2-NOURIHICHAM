<?php
session_start();

$_SESSION['name'] = $_POST['name'];
$_SESSION['ap1'] = $_POST['ap1'];
$_SESSION['ap2'] = $_POST['ap2'];
$_SESSION['dificultad'] = $_POST['dificultad'];



$_SESSION["i"] = 0;

if (isset($_SESSION['dificultad'])) {

   //TIENES QUE TERMMINAR ESTO
   //ruta donde guardara el archivo
   $dir = "images/";
   $ruta = $dir . basename($_FILES['avatar']['name']);
   //ruta temporal
   $tmp = $_FILES['archivo']['tmp_name'];
   //movemos el archivo
   move_uploaded_file($tmp, $ruta);
   $_SESSION['avatar'] = $ruta;

   header('Location: room1.php');
   exit;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Escape Room</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

   <section class="container">
      <h2 style="margin-top: 20px;">Escape room</h2>

      <form action="index.php" method="post" enctype="multipart/form-data">
         <div class="mb-3">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="name" value="Hicham" name="name" required>
         </div>
         <div class="mb-3">
            <label for="ap1" class="form-label">Primer apellido:</label>
            <input type="text" class="form-control" id="ap1" value="Nouri" name="ap1" required>
         </div>
         <div class="mb-3">
            <label for="ap2" class="form-label">Segundo apellido:</label>
            <input type="text" class="form-control" id="ap2" value="Chahid" name="ap2" required>
         </div>

         <div class="mb-3">
            <select class="form-select" name="dificultad" required>
               <option selected value="easy">Seleccione una dificultad</option>
               <option value="easy">Fácil</option>
               <option value="medium">Medio</option>
               <option value="hard">Dificil</option>
            </select>
         </div>

         <div class="mb-1">
            <label class="col-6" for="avatar">Seleccione una foto de perfil:</label>
            <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" required>
         </div>

         <div class="col-12">
            <button class="btn btn-primary" type="submit" style="margin-top: 15px;">Enviar</button>
         </div>
      </form>
   </section>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>