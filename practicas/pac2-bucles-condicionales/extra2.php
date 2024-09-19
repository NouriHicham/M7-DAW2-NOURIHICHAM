<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici extra 2: L’home del temps</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Exercici extra 2: L’home del temps</h1>

    <h2>El tiempo</h2>
    <div class="caja">
    <?php
        for($i=0;$i!=9;$i++){
            $temp=rand(-10,40);
            if($temp<10){
                echo "<div class='temp frio'><div>{$temp}ºC</div><div>Fred</div></div>";
            }else if($temp>25){
                echo "<div class='temp calor'><div>{$temp}ºC</div><div>Calor</div></div>";
            }else{
                echo "<div class='temp suau'><div>{$temp}ºC</div><div>Suau</div></div>";
            }
        }
    ?>
    </div>
    
    <a href="index.php"><div class="volver">Volver</div></a>
    
    

</body>
</html>