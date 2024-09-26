<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Frutas favoritas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table-green{
            background-color: #c6f5d2;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Selecciona tu fruta favorita</h1>

        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Fruta</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $frutas = [
                        ["nom" => "Manzana", "image" => "https://static.vecteezy.com/system/resources/previews/023/858/853/non_2x/ai-genrative-green-apple-free-png.png"],
                        ["nom" => "Plátano", "image" => "https://platanosruiz.com/wp-content/uploads/2023/02/platano-montaje.jpg"],
                        ["nom" => "Naranja", "image" => "https://www.ammarket.com/wp-content/uploads/2021/12/NARANJA_MESA_AMMARKET.COM_2.jpg"],
                        ["nom" => "Fresa", "image" => "https://medibangpaint.com/wp-content/uploads/2020/02/IMG_0408.jpg"],
                        ["nom" => "Kiwi", "image" => "https://www.frutas-hortalizas.com/img/fruites_verdures/presentacio/14.jpg"]
                    ];

                    $seleccionar = "✖ No seleccionada";
                    $color = "table-danger";

                    foreach($frutas as $fruta){

                        if(isset($_GET["seleccion"])){
                            $select = $_GET["seleccion"];
                            if($select==$fruta["nom"]){
                                $seleccionar = "✔ Seleccionada";
                                $color = "table-green";
                            }else{
                                $seleccionar = "✖ No seleccionada";
                                $color = "table-danger";
                            }
                        }

                        echo '<tr class="'.$color.'">
                                <td>'.$fruta["nom"].'</td>
                                <td>'.$seleccionar.'</td>
                                <td><a class="btn btn-primary" href="pac3b.php?seleccion='.$fruta["nom"].'">Seleccionar</a></td>
                            </tr>';
                    }
                ?>
            </tbody>
        </table>

        <!-- Mostrar tarjeta de la fruta seleccionada (actualmente estatica, siempre hay una manzana) -->

        <?php
            if(isset($_GET["seleccion"])){
                $select = $_GET["seleccion"];

                foreach($frutas as $fruta){

                    if($select==$fruta["nom"]){
                        echo '<div class="card mt-4 w-25 shadow-lg">
                                <img src="'.$fruta["image"].'" class="card-img-top img-fluid" alt="'.$fruta["nom"].'">
                                <div class="card-body bg-warning">
                                    <h5 class="card-title">Manzana</h5>
                                    <p class="card-text">¡Esta es tu fruta favorita!</p>
                                </div>
                            </div>';
                    }
                }
                

                
            }
        ?>
        

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<!-- aqui tienes el emoji de SELECCIONADA ✔️ para copiarlo y usarlo en la práctica -->
