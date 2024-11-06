<?php
   session_start();

   $_SESSION['name'] = $_POST['name'];
   $_SESSION['ap1'] = $_POST['ap1'];
   $_SESSION['ap2'] = $_POST['ap2'];
   $_SESSION['dificultad'] = $_POST['dificultad'];

   if (isset($_SESSION['dificultad'])) {
      if($_SESSION['dificultad'] == "easy"){
         header('Location: room1.php');
         exit;
      }else if($_SESSION['dificultad'] == "medium"){
         header('Location: room2.php');
         exit;
      } else if ($_SESSION['dificultad'] == "hard") {
         header('Location: room3.php');
         exit;
      }
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
      <form action="" method="post">
         <div class="mb-3">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="name" value="Hicham" name="name">
         </div>
         <div class="mb-3">
            <label for="ap1" class="form-label">Primer apellido:</label>
            <input type="text" class="form-control" id="ap1" value="Nouri" name="ap1">
         </div>
         <div class="mb-3">
            <label for="ap2" class="form-label">Segundo apellido:</label>
            <input type="text" class="form-control" id="ap2" value="Chahid" name="ap2">
         </div>

         <select class="form-select" name="dificultad">
            <option selected>Seleccione una dificultad</option>
            <option value="easy">Fácil</option>
            <option value="medium">Medio</option>
            <option value="hard">Dificil</option>
         </select>
         <div class="col-12">
            <button class="btn btn-primary" type="submit" style="margin-top: 15px;">Enviar</button>
         </div>
      </form>
   </section>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>