<?php
   include_once 'clases.php';
   session_start();
   if(!isset($_SESSION['prueba'])){

      $_SESSION['prueba'] = new Biblioteca;

      $_SESSION['prueba']->afegirLlibre('Cien años de soledad', 'Gabriel García Márquez', 1967, 'https://m.media-amazon.com/images/I/91TvVQS7loL._AC_UF894,1000_QL80_.jpg');
      $_SESSION['prueba']->afegirLlibre('Mil soles espléndidos', 'Khaled Hosseini', 2007, 'https://m.media-amazon.com/images/I/71dGXojweAL._UF1000,1000_QL80_.jpg');
      $_SESSION['prueba']->afegirLlibre('El principito', 'Antoine de Saint-Exupéry', 1943, 'https://m.media-amazon.com/images/I/714Hvb52n-L._AC_UF894,1000_QL80_.jpg');
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
   <div class="container">
      <a href="logout.php" class="btn btn-danger mt-3">Reiniciar</a>
      <div class="row">
         <div class="col">
            <h2>Afegir llibre</h2>
            
            <form method="get">
               <div class="mb-3">
                  <label for="titol" class="form-label">Títol</label>
                  <input type="text" class="form-text" id="titol" name="titol" value="1984">
               </div>
               <div class="mb-3">
                  <label for="autor" class="form-label">Autor</label>
                  <input type="text" class="form-text" id="autor" name="autor" value="George Orwell">
               </div>
               <div class="mb-3">
                  <label for="any" class="form-label">Any publicació</label>
                  <input type="number" class="form-text" id="any" name="any" value="1949">
               </div>
               <div class="mb-3">
                  <label for="imatge" class="form-label">Url imatge</label>
                  <input type="text" class="form-text" id="imatge" name="imatge" value="https://m.media-amazon.com/images/I/71sOSrd+JxL._AC_UF894,1000_QL80_.jpg">
               </div>
               <button type="submit" class="btn btn-primary" name="tipo" value="afegir">Afegir</button>
            </form>
         </div>
         <div class="col">
            <h2>Buscar llibre</h2>
            <form method="get">
               <div class="mb-3">
                  <label for="titol" class="form-label">Títol</label>
                  <input type="text" class="form-text" id="titol" name="titol">
               </div>
               <button type="submit" class="btn btn-primary" name="tipo" value="buscar">Buscar</button>
            </form>
         </div>
      </div>
      <h3 class="mt-3">Llibres</h3>
      <div class="d-flex flex-wrap">
         <?php 
            if($_GET['tipo']=='afegir'){
               $_SESSION['prueba']->afegirLlibre($_GET['titol'],$_GET['autor'],$_GET['any'],$_GET['imatge']);
               $_SESSION['prueba']->mostrarLlibres(); 
            }else if($_GET['tipo']=='buscar'){
               echo $_SESSION['prueba']->buscarLlibre($_GET['titol']);
            }else{
               $_SESSION['prueba']->mostrarLlibres(); 
            }
            
         ?>
      </div>
      
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>