<?php
  session_start();
  require_once 'config.php';

  $lugares = $mysqli->query("SELECT * FROM places order by id asc")->fetch_all(MYSQLI_ASSOC);
  $memorias = $mysqli->query("SELECT * FROM memories ORDER BY id asc")->fetch_all(MYSQLI_ASSOC);

  if(!isset($_SESSION['name'])){
    header("Location: login.php");
    exit;
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de Recuerdos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(to bottom, #f0f5ff, #f5f0ff);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        a{
            color: #4f46e5;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0 text-primary fw-bold">Recuerdos</h1>
                <div>
                    <?php
                        echo 'Bienvenido, '. $_SESSION['name']. '. <a href="logout.php" class="btn btn-primary">Cerrar sesión</a>';
                    ?>
                    <a href="new_sitio.php" class="btn btn-primary">
                        <i class="fas fa-plus-circle me-2"></i>
                        <span>Añadir sitio</span>
                    </a>
                    <a href="new_recuerdo.php" class="btn btn-primary">
                        <i class="fas fa-plus-circle me-2"></i>
                        <span>Crear recuerdo</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container py-5">

        <section id="mapa"></section>
        <section>
            <h2 class="h4 mb-4 text-dark">Muchas cosas</h2>
            <div class="row g-4">
                <?php
                    foreach ($memorias as $memoria){
                        echo '
                            
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card h-100">
                                    <a href="recuerdo_single.php?id='.$memoria['id'].'"><img src="'.$memoria['image_url'].'" class="card-img-top" alt="Viaje a la playa"></a>
                                    <div class="card-body">
                                        <a href="recuerdo_single.php?id='.$memoria['id'].'"><h5 class="card-title">'.$memoria['title'].'</h5></a>
                                        <p class="card-text text-muted small mb-2">
                                            <i class="far fa-calendar me-1"></i>
                                            '.$memoria['date'].'
                                        </p>
                                        <p class="card-text">'.$memoria['description'].'</p>
                                    </div>
                                    <div class="card-footer bg-white">
                                        <small class="text-muted">
                                            <i class="far fa-user me-1"></i>
                                            Compartido por '.$memoria['user'].'
                                        </small>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                ?>

            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>