<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 3: Nombre aleatori parell o senar</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Exercici 3: Nombre aleatori parell o senar</h1>

    <?php
        $random = rand(1,100);

        $resto=$random%2;
        if($resto==0){
            echo "<div class='individual random'>El numero {$random} es par</div>";
        }else{

        }
    ?>

    <a href="index.php"><div class="volver">Volver</div></a>

</body>
</html>