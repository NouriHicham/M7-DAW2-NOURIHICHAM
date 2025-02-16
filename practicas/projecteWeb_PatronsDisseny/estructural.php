<?php
   include_once 'header.php';
   include_once 'nav.php';
   $titulo = "Patrones estructurales";

   if (isset($_GET['patron'])) {
      switch ($_GET['patron']) {
         case 'adapter':
            header('Location: patrons/adapter.php');
            break;
         case 'bridge':
            header('Location: patrons/bridge.php');
            break;
         case 'composite':
            header('Location: patrons/composite.php');
            break;
         case 'decorator':
            header('Location: patrons/decorator.php');
            break;
         case 'facade':
            header('Location: patrons/facade.php');
            break;
         case 'flyweight':
            header('Location: patrons/flyweight.php');
            break;
         case 'proxy':
            header('Location: patrons/proxy.php');
            break;
         default:
            header('Location: estructural.php');
            break;
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
      <?= titulo($titulo);?>
      <p>Los patrones estructurales explican cómo ensamblar objetos y clases en estructuras más grandes, a la vez que se mantiene la flexibilidad y eficiencia de estas estructuras.</p>
      <form action="" method="get">
         <select name="patron" id="">
            <option value="adapter">Adapter</option>
            <option value="bridge">Bridge</option>
            <option value="composite">Composite</option>
         </select>
         <input type="submit" value="Submit">
      </form>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>