<?php
   session_start();
   require_once 'config.php';


    if(!isset($_SESSION['name'])){
      header("Location: login.php");
      exit;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $titulo = $_POST['title'];
      $descripcion = $_POST['description'];
      $latitud = floatval($_POST['latitude']);
      $longitud = floatval($_POST['longitude']);

      $stmt = $mysqli->prepare("INSERT INTO places (name, description, latitude, longitude) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("ssdd", $titulo, $descripcion, $latitud, $longitud);
  
      if ($stmt->execute()) {
          echo "Localización guardada.";
      } else {
          echo "Error al guardar.";
      }
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear sitio - Aplicación de Recuerdos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(to bottom, #f0f5ff, #f5f0ff);
        }

         input::file-selector-button {
            color: gray;
            padding: 0.5em;
            border: none;
            border-radius: 3px;
            background-color: whitesmoke;
            cursor: pointer;
            margin-right: 20px;
         }

         input::file-selector-button:hover {
            background-color: darkgray;
            color: black;
         }

         #mapa {
            height: 300px;
            width: 100%;
            margin-top: 10px;
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
                <h1 class="h4 mb-0 mx-auto pe-5">Crear nueva localización</h1>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="title" class="form-label">Título</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Título del recuerdo" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Descripción</label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Una pequeña descripción" required>
                            </div>

                            <div class="mb-3">
                                <label for="location" class="form-label">Localización</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Buscar una dirección...">
                                <div id="mapa"></div>
                            </div>

                            <!-- Campos ocultos para guardar latitud y longitud -->
                            <input type="text" id="latitude" name="latitude" required placeholder="Latitud">
                            <input type="text" id="longitude" name="longitude" required placeholder="Longitud">

                            <button type="submit" id="submitBtn" class="btn btn-primary w-100">Guardar recuerdo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCM7DchK1qvCFrDbp4XWw8O9fL3k0s3LX4&callback=initMap&libraries=places" async defer></script>

    <script>
        let map, marker, autocomplete;

        function initMap() {
            // Centro inicial del mapa
            const defaultLocation = { lat: 41.436849, lng: 2.218056 }; // Ejemplo: casa

            // Crear el mapa
            map = new google.maps.Map(document.getElementById("mapa"), {
                center: defaultLocation,
                zoom: 12,
            });

            // Crear marcador inicial
            marker = new google.maps.Marker({
                position: defaultLocation,
                map: map,
                draggable: true
            });

            // Escuchar el movimiento del marcador y actualizar campos ocultos
            google.maps.event.addListener(marker, "dragend", function () {
                const position = marker.getPosition();
                document.getElementById("latitude").value = position.lat();
                document.getElementById("longitude").value = position.lng();
            });

            // Inicializa Autocomplete correctamente
            const input = document.getElementById("location");
            autocomplete = new google.maps.places.Autocomplete(input, {
                fields: ["geometry", "name"], // Usa "geometry" para obtener lat/lng
            });

            // Escuchar cuando el usuario seleccione una ubicación
            autocomplete.addListener("place_changed", function () {
                const place = autocomplete.getPlace();
                if (!place.geometry) {
                    console.log("No se encontró coordenadas para la ubicación.");
                    return;
                }

                // Mover el mapa y el marcador a la nueva ubicación
                map.setCenter(place.geometry.location);
                marker.setPosition(place.geometry.location);

                // Guardar coordenadas
                document.getElementById("latitude").value = place.geometry.location.lat();
                document.getElementById("longitude").value = place.geometry.location.lng();
            });
        }
    </script>
</body>
</html>