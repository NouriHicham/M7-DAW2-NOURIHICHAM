<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 2: Taules de multiplicar</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Exercici 2: Taules de multiplicar</h1>

    <div class="caja">
        <?php
            
            
            for($i=0;$i!=11;$i++){
                echo "<div class='individual'>";
                echo "Tabla del $i";
                for($j=0;$j!=11;$j++){
                
                    $mult=$i*$j;
                    echo "<div class='mult'>$i x {$j}={$mult}</div>";
                }
                echo "</div>";
            }
        ?>
    </div>
    
    <a href="index.php"><div class="volver">Volver</div></a>

</body>
</html>