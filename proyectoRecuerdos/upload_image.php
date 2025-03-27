<?php
  session_start();
  require_once 'config.php';
  $uploadDir = 'uploads/locations/fotos/';

  if (!isset($_SESSION['name']) || !isset($_POST['memory_id'])) {
      header("Location: login.php");
      exit;
  }

  $memory_id = $_POST['memory_id'];

  if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
      // obtener info del archivo
      $fileTmpPath = $_FILES['image']['tmp_name'];
      $fileName = $_FILES['image']['name'];

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
        
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $stmt = $mysqli->prepare("INSERT INTO images (memory_id, image_path) VALUES (?, ?)");
            $stmt->bind_param("is", $memory_id, $dest_path);
            $stmt->execute();
            header("Location: recuerdo_single.php?id=" . $memory_id);
            exit;
        } else {
            echo "Error al mover el archivo.";
        }
      } else {
          echo "Formato de archivo no permitido.";
      }
  } else {
      echo "Error al subir el archivo.";
  }
?>
