<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 1: Nombres parells entre 50 i 500</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Exercici 1: Nombres parells entre 50 i 500</h1>

    <h2>Los siguientes numeros son pares</h2>
    <?php
        //comienza num en 50 hasta que llegues a 501
        echo "<div class='caja'>";
        for($num=50;$num!=501;$num++){
            //divide entre 2 y si el resto es 0, haz un echo
            $resto=$num%2;
            if($resto==0){
                echo "<div class='individual'>{$num} </div>";
            }
        }
        echo "</div>";
    ?>

    
    <a href="index.php"><div class="volver">Volver</div></a>
    
    

</body>
</html>