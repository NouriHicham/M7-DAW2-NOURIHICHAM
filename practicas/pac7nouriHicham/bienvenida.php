<!DOCTYPE html>
<html lang="ca">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Benvingut a la teva casa de Hogwarts</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
        
        <?php

            include_once 'arraycasas.php';
            $nombre = $_POST['name'];
            $ap = $_POST['ap'];
            
            $casas = array_keys($casas_info);
            $casa_seleccionada = $casas[array_rand($casas)];

            echo 
            '<div class="container text-center" style="background-color: '.$casas_info[$casa_seleccionada]["background_color"].'; padding-bottom: 15px;">
                <h1 style="background-color: '.$casas_info[$casa_seleccionada]["background_color"].'; color: '.$casas_info[$casa_seleccionada]["text_color"].';">¡Benvingut a la teva nova casa en Hogwarts!</h1>
                    <div class="welcome-message mt-4" style="background-color: '.$casas_info[$casa_seleccionada]["message_background"].'; color: '.$casas_info[$casa_seleccionada]["text_color"].'; border-radius: 10px;">
                        <h2>'.ucfirst($nombre).' '.ucfirst($ap).', has sigut seleccionat per '.$casas_info[$casa_seleccionada]["name"].'</h2>
                        <p>'.$casas_info[$casa_seleccionada]["welcome_message"].'</p>
                        <img src="'.$casas_info[$casa_seleccionada]["image"].'" style="width: 200px; height: auto; padding-bottom: 15px;">
                    </div>
            </div>';
                
        ?>

    
</body>
</html>