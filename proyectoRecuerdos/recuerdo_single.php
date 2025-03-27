<?php
  session_start();
  require_once 'config.php';

  if(!isset($_SESSION['name']) || !isset($_GET['id'])){
    header("Location: login.php");
    exit;
  }

  $id = $_GET['id'];
  
  
  $memoria = $mysqli->query("SELECT * FROM memories where id=$id")->fetch_all(MYSQLI_ASSOC);
  $lugardememoria = $memoria[0]['place_id'];

  $lugar = $mysqli->query("SELECT * FROM places where id=$lugardememoria")->fetch_all(MYSQLI_ASSOC);

  $imagenes = $mysqli->query("SELECT * FROM images WHERE memory_id=$id")->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de <?= $memoria[0]['title'] ?> - Aplicación de Recuerdos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(to bottom, #f0f5ff, #f5f0ff);
        }
        .carousel-item img {
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }
        .thumbnail {
            cursor: pointer;
            transition: opacity 0.3s;
            border-radius: 4px;
            height: 80px;
            object-fit: cover;
        }
        .thumbnail:hover {
            opacity: 0.8;
        }
        .thumbnail.active {
            border: 3px solid #4f46e5;
        }
        .memory-meta {
            display: flex;
            align-items: center;
            color: #6c757d;
            font-size: 0.9rem;
        }
        .memory-meta i {
            margin-right: 0.5rem;
        }
        .memory-meta span {
            margin-right: 1.5rem;
        }
        .comment {
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 1rem;
            margin-bottom: 1rem;
        }
        .comment:last-child {
            border-bottom: none;
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-weight: bold;
        }
        .location-tag {
            display: inline-block;
            background-color: #e9f5ff;
            color: #0d6efd;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            margin-right: 0.5rem;
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
                <h1 class="h4 mb-0 mx-auto pe-5">Detalle del Recuerdo</h1>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container py-5">
        <div class="row">
            <!-- Imágenes y detalles principales -->
            <div class="col-lg-8 mb-4">
                <!-- Carrusel de imágenes -->
                <div id="memoryCarousel" class="carousel slide mb-4" data-bs-ride="false">
                    <div class="carousel-inner">
                      <?php
                        foreach ($imagenes as $imagen) {
                          echo '
                            <div class="carousel-item active">
                                <img src="'.$imagen['image_path'].'" class="d-block w-100" alt="recuerdo'.$imagen['id'].'">
                            </div>
                          ';
                        }
                      ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#memoryCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#memoryCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>

                <!-- Miniaturas de imágenes -->
                <div class="row g-2 mb-4">
                      <?php
                        foreach ($imagenes as $imagen) {
                          echo '
                          <div class="col-2">
                              <img src="'.$imagen['image_path'].'" class="img-fluid thumbnail active" data-bs-target="#memoryCarousel" data-bs-slide-to="0" alt="recuerdo'.$imagen['id'].'">
                          </div>
                          ';
                        }
                      ?>
                    <!-- <div class="col-2"> -->
                    
                    <!-- <div class="d-flex justify-content-center align-items-center h-100 bg-light rounded">
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div> -->
                    <!-- </div> -->
                    <form action="upload_image.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="memory_id" value="<?= $id ?>">
                        <input type="file" name="image" required>
                        <button type="submit" class="btn btn-sm btn-outline-primary">Subir imagen</button>
                    </form>
                </div>

                <!-- Título y metadatos -->
                <div class="card">
                    <div class="card-body">
                        <h2 class="h3 mb-3">Viaje a la playa de Cancún</h2>
                        
                        <div class="memory-meta mb-3">
                            <i class="far fa-calendar"></i>
                            <span><?= $memoria[0]['date'] ?></span>
                            
                            <i class="fas fa-map-marker-alt"></i>
                            <span><?= $memoria[0]['title'] ?></span>
                            
                            <i class="far fa-user"></i>
                            <span><?= $memoria[0]['user'] ?></span>
                        </div>
                        
                        <p class="mb-0"><?= $memoria[0]['description'] ?></p>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar con recuerdos relacionados -->
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header bg-white">
                        <h3 class="h5 mb-0">Recuerdos relacionados</h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="d-flex">
                                    <img src="https://via.placeholder.com/100x100?text=Playa" class="rounded me-3" width="70" height="70" style="object-fit: cover;" alt="Miniatura">
                                    <div>
                                        <h6 class="mb-1">Vacaciones en Acapulco</h6>
                                        <small class="text-muted">10 de Mayo, 2023</small>
                                        <p class="mb-0 small text-truncate">Otro gran viaje a la playa con amigos...</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex">
                                    <img src="https://via.placeholder.com/100x100?text=Fiesta" class="rounded me-3" width="70" height="70" style="object-fit: cover;" alt="Miniatura">
                                    <div>
                                        <h6 class="mb-1">Fiesta en la playa</h6>
                                        <small class="text-muted">20 de Junio, 2023</small>
                                        <p class="mb-0 small text-truncate">Celebrando el cumpleaños de Laura...</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex">
                                    <img src="https://via.placeholder.com/100x100?text=Atardecer" class="rounded me-3" width="70" height="70" style="object-fit: cover;" alt="Miniatura">
                                    <div>
                                        <h6 class="mb-1">Atardecer en Tulum</h6>
                                        <small class="text-muted">5 de Julio, 2023</small>
                                        <p class="mb-0 small text-truncate">El mejor atardecer que he visto...</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header bg-white">
                        <h3 class="h5 mb-0">Ubicación</h3>
                    </div>
                    <div class="card-body p-0">
                        <!-- Mapa (placeholder) -->
                        <div id="mapa" style="height: 200px; width: 100%;"></div>
                        <div class="p-3">
                            <p class="mb-2">
                                <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                <?= $memoria[0]['title'] ?>
                            </p>
                            <a href="#" class="btn btn-sm btn-outline-primary w-100">
                                <i class="fas fa-directions me-1"></i> Ver en Google Maps
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script>
        // Activar las miniaturas al hacer clic
        document.querySelectorAll('.thumbnail').forEach(thumbnail => {
            thumbnail.addEventListener('click', function() {
                // Quitar la clase active de todas las miniaturas
                document.querySelectorAll('.thumbnail').forEach(item => {
                    item.classList.remove('active');
                });
                
                // Añadir la clase active a la miniatura seleccionada
                this.classList.add('active');
                
                // Obtener el índice del slide y activarlo
                const slideIndex = this.getAttribute('data-bs-slide-to');
                const carousel = new bootstrap.Carousel(document.getElementById('memoryCarousel'));
                carousel.to(parseInt(slideIndex));
            });
        });
        
        // Actualizar la miniatura activa cuando cambia el carrusel
        document.getElementById('memoryCarousel').addEventListener('slide.bs.carousel', function(event) {
            const slideIndex = event.to;
            
            // Quitar la clase active de todas las miniaturas
            document.querySelectorAll('.thumbnail').forEach(item => {
                item.classList.remove('active');
            });
            
            // Añadir la clase active a la miniatura correspondiente
            const activeThumb = document.querySelector(`.thumbnail[data-bs-slide-to="${slideIndex}"]`);
            if (activeThumb) {
                activeThumb.classList.add('active');
            }
        });
    </script>

        <!-- Mapa -->
        <script>
         var lati = <?php echo json_encode(floatval($lugar[0]['latitude'])); ?>;
         var long = <?php echo json_encode(floatval($lugar[0]['longitude'])); ?>;

        function initMap() {
            const ubicacion = { lat: lati, lng: long };

            const map = new google.maps.Map(document.getElementById("mapa"), {
                zoom: 12,
                center: ubicacion
            });

            new google.maps.Marker({
                position: ubicacion,
                map: map
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCM7DchK1qvCFrDbp4XWw8O9fL3k0s3LX4&callback=initMap" async defer></script>
</body>
</html>