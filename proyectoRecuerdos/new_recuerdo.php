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
                        <form id="memoryForm">
                            <div class="mb-3">
                                <label for="title" class="form-label">Título</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Título del recuerdo" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea class="form-control" id="description" name="description" rows="5" placeholder="Describe este momento especial..." required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label">Tu nombre</label>
                                <input type="text" class="form-control" id="author" name="author" placeholder="¿Quién comparte este recuerdo?" required>
                            </div>

                            <div class="mb-4">
                                <label for="fileInput" class="form-label">Imagen</label>
                                <label for="fileInput" class="file-upload d-block">
                                    <div class="file-upload-icon">
                                        <i class="fas fa-upload"></i>
                                    </div>
                                    <div class="text-muted">Haz clic para subir una imagen</div>
                                    <div id="fileName" class="text-success mt-2"></div>
                                </label>
                                <input type="file" id="fileInput" name="image" accept="image/*" class="d-none">
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

        // Manejar el envío del formulario
        document.getElementById('memoryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Guardando...';
            
            // Aquí conectarías con tu backend para guardar el recuerdo
            // Simulando una petición
            setTimeout(function() {
                // Redirigir a la página principal después de guardar
                window.location.href = 'index.html';
            }, 1000);
        });
    </script>
</body>
</html>