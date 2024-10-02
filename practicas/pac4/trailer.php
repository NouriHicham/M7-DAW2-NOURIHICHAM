<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trailer</title>
</head>
<body>
    <?php
        include 'peliculas.php';

        foreach($peliculas as $pelicula){
            if(isset($_GET["nom"])){
                $nom = $_GET["nom"];
            }

            if($nom==$pelicula["nom"]){
            echo '<iframe width="420" height="315" src="'.$pelicula["url_trailer"].'" autoplay="true"></iframe>';
            }
        }
    ?>
</body>
</html>