<?php
   session_start();
   require_once '../../config.php';

   $uploadDir = '../../uploads/testimonials/';

   // comprobar si es administrador
   if($_SESSION['role']!= 'admin'){
      header('Location: ../../index.php');
      exit;
   }

   // Obtener todos los testimonios
   if($_SERVER['REQUEST_METHOD']=='POST'){
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $description = $_POST['descripcion'];
      $puntuacion = $_POST['puntuacion'];

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

      $stmt = $mysqli->prepare("INSERT INTO TESTIMONIALS (name, surname, description, photo, rating) VALUES (?,?,?,?,?)");
      $stmt->bind_param("sssss", $nombre, $apellido, $description, $foto, $puntuacion);
      
      if($stmt->execute()){
         echo '<p>Testimonio añadido correctamente.</p>';
      }else{
         echo '<p>Error al añadir el testimonio: '. $stmt->error.'</p>';
      }

   }


?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Testimonios</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container mt-5">
   <a href="../admin.php" class="btn btn-secondary">Volver</a>

   <!-- Botón para abrir el modal -->
   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal">
      Añadir testimonio
   </button>

   <!-- Modal con Formulario -->
   <div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
         <h5 class="modal-title" id="miModalLabel">Añadir testimonio</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
         </div>
         <div class="modal-body">
         <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
               <label for="nombre" class="form-label">Nombre</label>
               <input type="text" class="form-control" id="nombre" placeholder="Escribe tu nombre" name="nombre" required>
            </div>
            <div class="mb-3">
               <label for="apellido" class="form-label">Apellido</label>
               <input type="text" class="form-control" id="apellido" placeholder="Escribe tu apellido" name="apellido" required>
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
               <label for="puntuacion" class="form-label">Puntuación (1-5)</label>
               <input type="number" class="form-control" id="puntuacion" min="1" max="5" name="puntuacion" required>
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

   <h1>Listado de testimonios</h1>
   <table class="table mx-4">
      <thead>
         <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Descripción</th>
            <th>Foto</th>
            <th>Puntuación</th>
            <th scope="col" colspan="2">Acciones</th>
         </tr>
      </thead>
      <tbody>
         <?php
            $testimonials = $mysqli->query("SELECT * FROM TESTIMONIALS order by id asc")->fetch_all(MYSQLI_ASSOC);
            foreach($testimonials as $testimonial){
               echo '<tr style="line-height: 16px;">';
               echo "<td>".$testimonial['id']."</td>";
               echo "<td>".$testimonial['name']."</td>";
               echo "<td>".$testimonial['surname']."</td>";
               echo "<td>".substr($testimonial['description'],0,30)." ...</td>";
               echo "<td><img src='".$testimonial['photo']."' alt='Foto testimonio".$testimonial['id']."' height='70px' width='auto'></td>";
               echo "<td>";
               for($i=1; $i<=$testimonial['rating']; $i++){
                  echo '<span>⭐</span>';
               }
               echo '<td><a href="delete-testimonials.php?id='.$testimonial['id'].'" class="btn btn-light" style="text-decoration: none;">🗑️</a></td>';
               echo '<td><a href="edit-testimonials.php?id='.$testimonial['id'].'" class="btn btn-light" style="text-decoration: none;">🖊️</a></td>';
               echo "</tr>";
            }
         ?>
      </tbody>
   </table>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>