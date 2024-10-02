<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de </title>
    <script src="https://kit.fontawesome.com/fe9b416b1c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="detall.css">
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
                            <div><a href="trailer.php?nom='.$pelicula["nom"].'" target=”_blank”><button><i class="fa-solid fa-circle-play"></i> Trailer</button></a></div>
                        </div>
                        <div class="info">
                            <div><p>'.$pelicula["sinopsi"].'</p></div>
                            <div><p><strong>Durada: </strong>'.$pelicula["durada"].'</p></div>
                            <div><p><strong>Director: </strong>'.$pelicula["director"].'</p></div>
                            <div><p><strong>Actors: </strong>'.$pelicula["repartiment"].'</p></div>
                            <div><p><strong>Qualificació: </strong>'.$pelicula["qualificacio"].'</p></div>
                            <div><p><strong>Gènere: </strong>'.$pelicula["genere"].'</p></div>
                            <div>
                                <div></div>
                                <div class="horaris">
                                    <div><p>Horaris</p></div>
                                    <div class="horas">
                                        <div>16:00</div>
                                        <div>18:00</div>
                                        <div>22:30</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>';
            }
        }
    ?>

    
</body>
</html>