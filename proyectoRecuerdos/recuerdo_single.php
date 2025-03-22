<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Recuerdo - Aplicación de Recuerdos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
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
                <a href="index.html" class="text-primary text-decoration-none">
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
                        <div class="carousel-item active">
                            <img src="https://via.placeholder.com/800x400?text=Playa+1" class="d-block w-100" alt="Imagen 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/800x400?text=Playa+2" class="d-block w-100" alt="Imagen 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/800x400?text=Playa+3" class="d-block w-100" alt="Imagen 3">
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/800x400?text=Playa+4" class="d-block w-100" alt="Imagen 4">
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/800x400?text=Playa+5" class="d-block w-100" alt="Imagen 5">
                        </div>
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
                    <div class="col-2">
                        <img src="https://via.placeholder.com/150x150?text=1" class="img-fluid thumbnail active" data-bs-target="#memoryCarousel" data-bs-slide-to="0" alt="Miniatura 1">
                    </div>
                    <div class="col-2">
                        <img src="https://via.placeholder.com/150x150?text=2" class="img-fluid thumbnail" data-bs-target="#memoryCarousel" data-bs-slide-to="1" alt="Miniatura 2">
                    </div>
                    <div class="col-2">
                        <img src="https://via.placeholder.com/150x150?text=3" class="img-fluid thumbnail" data-bs-target="#memoryCarousel" data-bs-slide-to="2" alt="Miniatura 3">
                    </div>
                    <div class="col-2">
                        <img src="https://via.placeholder.com/150x150?text=4" class="img-fluid thumbnail" data-bs-target="#memoryCarousel" data-bs-slide-to="3" alt="Miniatura 4">
                    </div>
                    <div class="col-2">
                        <img src="https://via.placeholder.com/150x150?text=5" class="img-fluid thumbnail" data-bs-target="#memoryCarousel" data-bs-slide-to="4" alt="Miniatura 5">
                    </div>
                    <div class="col-2">
                        <div class="d-flex justify-content-center align-items-center h-100 bg-light rounded">
                            <button class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Título y metadatos -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="h3 mb-3">Viaje a la playa de Cancún</h2>
                        
                        <div class="memory-meta mb-3">
                            <i class="far fa-calendar"></i>
                            <span>15 de Junio, 2023</span>
                            
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Cancún, México</span>
                            
                            <i class="far fa-user"></i>
                            <span>María García</span>
                        </div>
                        
                        <div class="mb-3">
                            <span class="location-tag">
                                <i class="fas fa-umbrella-beach me-1"></i> Playa
                            </span>
                            <span class="location-tag">
                                <i class="fas fa-sun me-1"></i> Verano
                            </span>
                            <span class="location-tag">
                                <i class="fas fa-users me-1"></i> Amigos
                            </span>
                        </div>
                        
                        <p class="mb-0">Un día increíble con amigos en la playa de Cancún. Nadamos, comimos y vimos el atardecer juntos. El agua estaba cristalina y la arena blanca como nunca antes había visto. Disfrutamos de la comida local y bebidas refrescantes mientras compartíamos historias y risas bajo el sol.</p>
                    </div>
                </div>

                <!-- Comentarios -->
                <div class="card">
                    <div class="card-header bg-white">
                        <h3 class="h5 mb-0">Comentarios (3)</h3>
                    </div>
                    <div class="card-body">
                        <div class="comment">
                            <div class="d-flex mb-2">
                                <div class="user-avatar me-2">
                                    <span>CR</span>
                                </div>
                                <div>
                                    <h6 class="mb-0">Carlos Rodríguez</h6>
                                    <small class="text-muted">Hace 2 días</small>
                                </div>
                            </div>
                            <p class="mb-0">¡Qué recuerdos tan increíbles! Fue uno de los mejores viajes que hemos tenido juntos.</p>
                        </div>
                        
                        <div class="comment">
                            <div class="d-flex mb-2">
                                <div class="user-avatar me-2">
                                    <span>AL</span>
                                </div>
                                <div>
                                    <h6 class="mb-0">Ana López</h6>
                                    <small class="text-muted">Hace 3 días</small>
                                </div>
                            </div>
                            <p class="mb-0">Las fotos son hermosas. Me encantaría volver a ese lugar pronto.</p>
                        </div>
                        
                        <div class="comment">
                            <div class="d-flex mb-2">
                                <div class="user-avatar me-2">
                                    <span>JM</span>
                                </div>
                                <div>
                                    <h6 class="mb-0">Juan Martínez</h6>
                                    <small class="text-muted">Hace 5 días</small>
                                </div>
                            </div>
                            <p class="mb-0">¡Ese atardecer fue mágico! Gracias por compartir estos momentos.</p>
                        </div>
                        
                        <!-- Formulario de comentario -->
                        <div class="mt-4">
                            <h6>Deja un comentario</h6>
                            <form>
                                <div class="mb-3">
                                    <textarea class="form-control" rows="3" placeholder="Escribe tu comentario..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Comentar</button>
                            </form>
                        </div>
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
                        <img src="https://via.placeholder.com/400x300?text=Mapa+de+Cancún" class="img-fluid" alt="Mapa">
                        <div class="p-3">
                            <p class="mb-2">
                                <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                Playa Delfines, Cancún, México
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

    <!-- Footer -->
    <footer class="bg-white py-4 mt-5 shadow-sm">
        <div class="container text-center text-muted">
            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Aplicación de Recuerdos</p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
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
</body>
</html>