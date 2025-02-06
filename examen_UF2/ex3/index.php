<?php
   session_start();

   include_once 'Hotel.class.php';

   if(!isset($_SESSION['hotel'])){
      $_SESSION['hotel'] = new Hotel();

      $_SESSION['hotel'] = serialize($_SESSION['hotel']);
   }

   if (isset($_SESSION['hotel'])) {
      $facturas = unserialize($_SESSION['hotel']);
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

<form action="" method="post">
      <select class="" aria-label="Default select example" name="hotel">
         <option value="suit">Suit</option>
         <option value="doble">doble</option>
         <option value="individual">individual</option>
      </select>
</form>

<?php
   if(isset($_POST['hotel'])){
      $facturas->reservarHabitacio($_POST['hotel']);
      echo $facturas->llistarHabitacions();
   }else{
      echo $facturas->mostrarDisponibilitat();
   }
?>

   <button class="btn btn-secondary mt-3"><a href="logout.php" class="link-offset-2 link-underline link-underline-opacity-0 link-light">Reiniciar juego</a></button>
   <button class="btn btn-secondary mt-3"><a href="../index.php" class="link-offset-2 link-underline link-underline-opacity-0 link-light">Inicio</a></button>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>