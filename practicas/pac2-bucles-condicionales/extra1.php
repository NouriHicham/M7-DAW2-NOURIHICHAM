<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici extra 1: Divisors d'un nombre i verificació de nombre primer</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Exercici extra 1: Divisors d'un nombre i verificació de nombre primer</h1>

    <?php
        $chivato = 0;
        $random = rand(1,100);

        echo "<h2>Número generado: {$random}</h2>";

        echo "<div class='caja'>";
        for($i=1;$i!=$random+1;$i++){
            if($i==1){
                echo "<div class='individual'>$i</div>";
            }else if($i==2){
                echo "<div class='individual'>$i</div>";
            }else{

                for($j=1 ; $j!=$i+1 ; $j++){
                    $resto=$i%$j;

                    if($resto==0){
                        $chivato++;
                    }
                    
                }

                if($chivato==2){
                    echo "<div class='individual'>$i</div>";
                }
                $chivato=0;
            }
        }

        echo "</div>";

    ?>

    <a href="index.php"><div class="volver">Volver</div></a>

</body>
</html>