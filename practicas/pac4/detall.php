<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de </title>
    <script src="https://kit.fontawesome.com/fe9b416b1c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="detall.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
        include 'peliculas.php';

        foreach($peliculas as $pelicula){
            if(isset($_GET["nom"])){
                $nom = $_GET["nom"];
            }

            if($nom==$pelicula["nom"]){
            echo '<header><h1>'.$pelicula["nom"].'</h1></header>
                    <main>
                        <div class="image">
                            <div><img src="'.$pelicula["imatge"].'" alt="'.$pelicula["nom"].'"></div>
                            <div><a href="trailer.php?nom='.$pelicula["nom"].'" target=”_blank”><button class="boton"><i class="fa-solid fa-circle-play"></i> Trailer</button></a></div>
                        </div>
                        <div class="info">
                            <div><p>'.$pelicula["sinopsi"].'</p></div>
                            <div><p><strong>Durada: </strong>'.$pelicula["durada"].'</p></div>
                            <div><p><strong>Director: </strong>'.$pelicula["director"].'</p></div>
                            <div><p><strong>Actors: </strong>'.$pelicula["repartiment"].'</p></div>
                            <div><p><strong>Qualificació: </strong>'.$pelicula["qualificacio"].'</p></div>
                            <div><p><strong>Gènere: </strong>'.$pelicula["genere"].'</p></div>
                            <div>
                                <div class="horaris">
                                    <div><p>Horaris</p></div>
                                    <div class="horas">
                                        <div>
                                        '.implode("</div><div>",$pelicula["horaris_projeccio"]).'
                                    </div>
                                </div>
                            </div>';

                            
            }
        }
    ?>

    <?php
        foreach($peliculas as $pelicula){
            if(isset($_GET["nom"])){
                $nom = $_GET["nom"];
            }

            if($nom==$pelicula["nom"]){
                for($i=0;$i<$pelicula["estrelles"];$i++){
                    echo'<i class="fa-solid fa-star" style="color: rgb(196, 30, 30);"></i>';
                }
                $resto=5-$pelicula["estrelles"];
                for($i=0;$i<$resto;$i++){
                    echo'<i class="fa-solid fa-star" style="color: gray;"></i>';
                }
                
            }
        }
        echo '</div></main>';
    ?>


    <?php
        foreach($peliculas as $pelicula){
            if(isset($_GET["nom"])){
                $nom = $_GET["nom"];
            }

            if($nom==$pelicula["nom"]){
                echo '<div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img src="'.$pelicula["carrusel"].'" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                <img src="'.$pelicula["carrusel2"].'" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                <img src="'.$pelicula["carrusel3"].'" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>';
            }
        }
    ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>