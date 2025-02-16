<?php
   include_once 'header.php';
   include_once 'nav.php';
   $titulo = "Patrones de comportamiento";

   if (isset($_GET['patron'])) {
      if ($_GET['patron'] == 'observer') {
         header('Location: patrons/observer.php');
      } elseif ($_GET['patron'] == 'strategy') {
         header('Location: patrons/strategy.php');
      } elseif ($_GET['patron'] == 'command') {
         header('Location: patrons/command.php');
      } else {
         header('Location: comportament.php');
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
         <p>Los patrones de comportamiento tratan con algoritmos y la asignación de responsabilidades entre objetos.</p>
      </section>
      <form action="" method="get">
         <select name="patron" id="">
            <option value="observer">Observer</option>
            <option value="strategy">Strategy</option>
            <option value="command">Command</option>
         </select>
         <input type="submit" value="Submit">
      </form>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>