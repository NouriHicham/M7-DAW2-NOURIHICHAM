<?php
  session_start();
  require_once 'config.php';

  $uploadDir = 'uploads/locations/portada/';

  $user_id = $_SESSION['id'];
  $grupo = $mysqli->query("SELECT * FROM group_users where user_id = $user_id")->fetch_all(MYSQLI_ASSOC);
  $grupo = intval($grupo[0]['group_id']);

  if(!isset($_SESSION['name'])){
    header("Location: login.php");
    exit;
  }

  if($_SERVER['REQUEST_METHOD']=='POST'){
  $titulo = $_POST['titulo'];
  $description = $_POST['description'];
  $user = $_SESSION['name'];
  $place = $_POST['localizacion'];
  $fecha = $_POST['fecha'];

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

  $stmt = $mysqli->prepare("INSERT INTO memories (place_id, title, description, user, date, image_url, group_id) VALUES (?,?,?,?,?,?,?)");
  $stmt->bind_param("isssssi", $place, $titulo, $description, $user, $fecha, $foto, $grupo);
  
  if($stmt->execute()){
      echo '<p>Proyecto añadido correctamente.</p>';
  }else{
      echo '<p>Error al añadir el proyecto: '. $stmt->error.'</p>';
  }

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Recuerdo - Aplicación de Recuerdos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(to bottom, #f0f5ff, #f5f0ff);
        }
        .file-upload {
            border: 2px dashed #dee2e6;
            border-radius: 0.5rem;
            padding: 2rem;
            text-align: center;
            cursor: pointer;
        }
        .file-upload-icon {
            font-size: 2.5rem;
            color: #adb5bd;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="container py-4">
            <div class="d-flex align-items-center">
                <a href="index.php" class="text-primary text-decoration-none">
                    <i class="fas fa-arrow-left me-2"></i>
                    <span>Volver</span>
                </a>
                <h1 class="h4 mb-0 mx-auto pe-5">Crear nuevo recuerdo</h1>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <form id="memoryForm" enctype="multipart/form-data" method="POST"> 
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título del recuerdo" required>
                            </div>

                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha de la sucesion</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea class="form-control" id="description" name="description" rows="5" placeholder="Describe este momento especial..." required></textarea>
                            </div>

                            <div class="mb-3">
                              <label for="url" class="form-label">Localizacion</label>
                              <select class="form-control" name="localizacion" id="localizacion" required>
                                <option value="">Seleccione una localización...</option>
                                <?php
                                  $stmt = $mysqli->prepare("SELECT id, name FROM places ORDER BY name");
                                  $stmt->execute();
                                  $stmt->bind_result($id, $name);

                                  while($stmt->fetch()){
                                    echo '<option value="'.$id.'">'.$name.'</option>';
                                  }

                                  $stmt->close();
                                ?>
                              </select>

                            <div class="mb-4">
                                <label for="fileInput" class="form-label">Imagen</label>
                                <label for="fileInput" class="file-upload d-block">
                                    <div class="file-upload-icon">
                                        <i class="fas fa-upload"></i>
                                    </div>
                                    <div class="text-muted">Haz clic para subir una imagen</div>
                                    <div id="fileName" class="text-success mt-2"></div>
                                </label>
                                <input type="file" id="fileInput" name="foto" accept="image/*" class="d-none">
                            </div>

                            <button type="submit" id="submitBtn" class="btn btn-primary w-100">Guardar recuerdo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script>
        // Mostrar el nombre del archivo seleccionado
        document.getElementById('fileInput').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : '';
            document.getElementById('fileName').textContent = fileName ? 'Imagen seleccionada: ' + fileName : '';
        });
    </script>
</body>
</html>