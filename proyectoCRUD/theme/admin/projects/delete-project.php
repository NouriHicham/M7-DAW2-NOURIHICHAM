<?php
   session_start();
   require_once '../../config.php';

   if(!isset($_GET['id'])){
      header('Location: ../admin.php');
      exit();
   }

   // corregir la asignacion de id
   $id = (int) $_GET['id'];

   $result=$mysqli->query("SELECT * FROM PROJECTS where id = $id");

   $proyecto = $result->fetch_assoc();

   if($_SERVER['REQUEST_METHOD']=='POST'){
      
      $stmt = $mysqli->prepare("DELETE FROM PROJECTS WHERE id=?");
      $stmt->bind_param("i", $id);

      if($stmt->execute()){
         header('Location: project.php');
         exit();
      }else{
         echo 'alert("Hubo un error al eliminar el proyecto");';
         header('Location: project.php');
         exit();
      }

   }
?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Eliminar proyecto</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container mt-5">

   <h4>Esta seguro de que desea eliminar el siguiente proyecto?</h4>
   <p><?php echo $proyecto['title']?></p>
   <img src="<? echo $proyecto['thumbnail'] ?>" alt="" height="200px" width="auto">
   
   <form action="" method="post" class="mt-3">
      <input type="hidden" name="id" value="<?php echo $proyecto['id']?>">

      <input class="btn btn-danger" type="submit" value="Si, Eliminar">
      <a href="project.php" class="btn btn-success">No, Volver</a>
   </form>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>