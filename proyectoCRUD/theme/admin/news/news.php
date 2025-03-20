<?php
   session_start();
   require_once '../../config.php';

   $uploadDir = '../../uploads/news/';

   // comprobar si es administrador
   if($_SESSION['role']!= 'admin'){
      header('Location: ../../index.php');
      exit;
   }

   $mensaje = '';

   if($_SERVER['REQUEST_METHOD']=='POST'){
      $titulo = $_POST['titulo'];
      $subtitulo = $_POST['subtitulo'];
      $description = $_POST['descripcion'];

      //comprovar si se ha subido un archivo
      // procesar el archivo subido
      if(isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK){
         // obtener info del archivo
         $fileTmpPath = $_FILES['foto']['tmp_name'];
         $fileName = $_FILES['foto']['name'];

         //separar el nombre de la extension
         $fileNameCmps = explode(".", $fileName);
         $fileExtension = strtolower(end($fileNameCmps));

         //definir las extensiones permitidas
         $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

         //comprobar si la extension es permitida
         if(in_array($fileExtension, $allowedExtensions)){
            // renombrar el archivo para evitar duplicados
            $newFileName = md5(time()). '.'. $fileExtension;

            //ruta final en la carpeta
            $dest_path = $uploadDir . $newFileName;

            // mover el archivo del directorio temporal al directorio de subidas
            if(move_uploaded_file($fileTmpPath, $dest_path)){
               $foto = $dest_path;
            } else {
               echo '<p>Error al subir el archivo.</p>';
               exit;
            }
         } else {
            echo '<p>Formato de archivo no permitido.</p>';
            exit;
         }
      }

      $hoy = date('Y-m-j');
      $stmt = $mysqli->prepare("INSERT INTO NEWS (title, subtitle, thumbnail, description, new_date) VALUES (?,?,?,?,?)");
      $stmt->bind_param("sssss", $titulo, $subtitulo, $foto, $description, $hoy);
      
      if($stmt->execute()){
         $mensaje = 'Noticia añadida correctamente';
         header('Location: ' . $_SERVER['PHP_SELF'] . '?success=1');
      }else{
         $message = 'Error al añadir la noticia: ' . $stmt->error;
      }

      // Verificar si hay un mensaje de éxito en la URL
      if(isset($_GET['success']) && $_GET['success'] == 1) {
         $message = 'Noticia añadida correctamente.';
      }

   }


?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Noticias</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container mt-5">
   <a href="../admin.php" class="btn btn-secondary">Volver</a>

   <!-- Botón para abrir el modal -->
   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal">
      Añadir noticia
   </button>

   <?php
      // Mostrar el mensaje si existe
      if($message) {
         echo '<div class="alert alert-success">' . $message . '</div>';
      }
   ?>

   <!-- Modal con Formulario -->
   <div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
         <h5 class="modal-title" id="miModalLabel">Añadir proyecto</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
         </div>
         <div class="modal-body">
         <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
               <label for="titulo" class="form-label">Titulo</label>
               <input type="text" class="form-control" id="titulo" placeholder="Escribe el titulo" name="titulo" required>
            </div>
            <div class="mb-3">
               <label for="subtitulo" class="form-label">Subtitulo</label>
               <input type="text" class="form-control" id="subtitulo" placeholder="Escribe el subtitulo" name="subtitulo" required>
            </div>
            <div class="mb-3">
               <label for="descripcion" class="form-label">Descripción</label>
               <textarea class="form-control" id="descripcion" rows="3" name="descripcion" required></textarea>
            </div>
            <div class="mb-3">
               <label for="foto" class="form-label">Foto</label>
               <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
            </div>
            <div class="mb-3">
               <button type="submit" class="btn btn-primary">Añadir</button>
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
         </form>
         </div>
      </div>
   </div>
   </div>

   <h1>Listado de noticias</h1>
   <table class="table mx-4">
      <thead>
         <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Subtitulo</th>
            <th>Description</th>
            <th>Thumbnail</th>
            <th>Fecha añadido</th>
            <th scope="col" colspan="2">Acciones</th>
         </tr>
      </thead>
      <tbody>
         <?php
            $noticias = $mysqli->query("SELECT * FROM NEWS order by id asc")->fetch_all(MYSQLI_ASSOC);
            foreach($noticias as $noticia){
               echo '<tr style="line-height: 16px;">';
               echo "<td>".$noticia['id']."</td>";
               echo "<td>".$noticia['title']."</td>";
               echo "<td>".$noticia['subtitle']."</td>";
               echo "<td>".substr($noticia['description'],0,40)." ...</td>";
               echo "<td><img src='../../".$noticia['thumbnail']."' alt='Foto noticia".$noticia['id']."' height='100px' width='auto'></td>";
               echo "<td>".$noticia['new_date']."</td>";
               echo '<td><a href="delete-new.php?id='.$noticia['id'].'" class="btn btn-outline-danger" style="text-decoration: none;">🗑️</a></td>';
               echo '<td><a href="edit-new.php?id='.$noticia['id'].'" class="btn btn-outline-success" style="text-decoration: none;">🖊️</a></td>';
               echo "</tr>";
            }
         ?>
      </tbody>
   </table>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>