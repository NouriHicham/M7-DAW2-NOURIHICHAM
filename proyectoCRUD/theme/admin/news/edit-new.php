<?php
session_start();
require_once '../../config.php';
$uploadDir = '../../uploads/news/';
$stmtPrepared = "UPDATE NEWS SET title=?, subtitle=?, description=?, new_date=? WHERE id=?";

if (!isset($_GET['id'])) {
   header('Location: ../admin.php');
   exit();
}

// corregir la asignacion de id
$id = (int) $_GET['id'];

$result = $mysqli->query("SELECT * FROM NEWS where id = $id");

$noticia = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $title = $_POST['title'];
   $subtitle = $_POST['subtitle'];
   $description = $_POST['description'];
   $new_date = date('Y-m-d');

   //comprovar si se ha subido un archivo
   // procesar el archivo subido
   if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
      // obtener info del archivo
      $fileTmpPath = $_FILES['foto']['tmp_name'];
      $fileName = $_FILES['foto']['name'];

      //separar el nombre de la extension
      $fileNameCmps = explode(".", $fileName);
      $fileExtension = strtolower(end($fileNameCmps));

      //definir las extensiones permitidas
      $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

      //comprobar si la extension es permitida
      if (in_array($fileExtension, $allowedExtensions)) {
         // renombrar el archivo para evitar duplicados
         $newFileName = md5(time()) . '.' . $fileExtension;

         //ruta final en la carpeta
         $dest_path = $uploadDir . $newFileName;

         // mover el archivo del directorio temporal al directorio de subidas
         if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $foto = $dest_path;
            $stmtPrepared = "UPDATE NEWS SET title=?, subtitle=?, description=?, new_date=?, thumbnail=? WHERE id=?";
            $stmt = $mysqli->prepare($stmtPrepared);
            $stmt->bind_param("sssssi", $title, $subtitle, $description, $new_date, $foto, $id);
         } else {
            echo '<p>Error al subir el archivo.</p>';
            exit;
         }
      } else {
         echo '<p>Formato de archivo no permitido.</p>';
         exit;
      }
   } else {
      $stmt = $mysqli->prepare($stmtPrepared);
      $stmt->bind_param("ssssi", $title, $subtitle, $description, $new_date, $id);
   }

   if ($stmt->execute()) {
      header('Location: news.php');
      exit();
   } else {
      echo 'alert("Hubo un error al editar la noticia");';
      header('Location: news.php');
      exit();
   }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Editar noticia</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
   <div class="container mt-5">
      <h1>Editar noticia</h1>
      <form action="" method="post" enctype="multipart/form-data">
         <label for="title">Titulo:</label><br>
         <input type="text" id="title" name="title" value="<?php echo $noticia['title'] ?>"><br>

         <label for="subtitle">Subtítulo:</label><br>
         <input type="text" id="subtitle" name="subtitle" value="<?php echo $noticia['subtitle'] ?>"><br>

         <label for="description">Descripción:</label><br>
         <textarea id="description" name="description" rows="4"><?php echo $noticia['description'] ?></textarea><br>

         <label for="foto">Foto:</label><br>
         <img src="<?php echo $noticia['thumbnail'] ?>" height="150px" width="auto">
         <input type="file" class="form-control" id="foto" name="foto" accept="image/*"><br>

         <input type="submit" value="Actualizar">

         <a href="../../index.php">Volver al inicio</a>
      </form>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>