<?php
   include_once 'header.php';
   include_once 'nav.php';
   $titulo = "Patrones creacionales";

   if (isset($_GET['patron'])) {
      if ($_GET['patron'] == 'factory') {
         header('Location: patrons/factory.php');
      } elseif ($_GET['patron'] == 'singleton') {
         header('Location: patrons/singleton.php');
      } elseif ($_GET['patron'] == 'builder') {
         header('Location: patrons/builder.php');
      } else {
         header('Location: creacion.php');
      }
   }
?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= $titulo?></title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="container mt-3 tarjeta">
      <?= navbar()?> 
      <section>
         <?= titulo($titulo);?>
         <p>Los patrones creacionales proporcionan varios mecanismos de creación de objetos que incrementan la flexibilidad y la reutilización del código existente.</p>
         <form action="" method="get">
            <select name="patron" id="">
               <option value="factory">Factory</option>
               <option value="singleton">Singleton</option>
               <option value="builder">Builder</option>
            </select>
            <input type="submit" value="Submit">
         </form>
      </section>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>