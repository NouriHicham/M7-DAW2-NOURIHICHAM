<?php
   session_start();

   if(isset($_GET['id_conf'])){
      $posicion = $_GET['id_conf']-1;
      array_splice($_SESSION['trivial'], $posicion, 1);

      $i=1;
      foreach($_SESSION['trivial'] as &$trivial){
         $trivial['id'] = $i;
         $i++;
      }
      unset($trivial);
      
      header('Location: manage.php');
      exit;
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

<section class="container mt-4">
      <h2>¿Desear eliminar esta pregunta?</h2>
   </section>
   <section class="container-fluid">
      <table class="table table-striped">
         <thead>
            <tr>
               <th scope="col">Pregunta</th>
               <th scope="col">Respuesta 1</th>
               <th scope="col">Respuesta 2</th>
               <th scope="col">Respuesta 3</th>
               <th scope="col">Respuesta correcta</th>
            </tr>
         </thead>
         <tbody>
            <?php
               foreach($_SESSION['trivial'] as $trivial){
                  if($_GET['id']==$trivial['id']){
                     echo '
                     <tr>
                        <th scope="row">'.$trivial['question'].'</th>
                        <td>'.$trivial['options'][0].'</td>
                        <td>'.$trivial['options'][1].'</td>
                        <td>'.$trivial['options'][2].'</td>
                        <td>'.$trivial['answer'].'</td>
                     </tr>
                  ';
                  }
               }
            ?>
         </tbody>
      </table>
      <form action="" method="post">
      <a href="delete_question.php?id_conf=<?= $_GET['id'] ?> "><button type="button" class="btn btn-danger">Eliminar pregunta</button></a> 
      <a href="manage.php"><button type="button" class="btn btn-primary">ME ARREPIENTO</button></a>
      </form>
   </section>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>