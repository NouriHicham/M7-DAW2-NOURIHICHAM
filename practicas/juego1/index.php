<?php
session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de la Ruleta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .imagen {
            animation: rotate-animation 2.5s linear infinite;
        }
        
        @keyframes rotate-animation {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="container" style="margin: 50px 0;">
            <div class="row align-items-center ">
                <div class="col"><img src="images/hero-ruleta.svg" alt="Ruleta" class="imagen"></div>
                <div class="col-8"><img src="images/apuestas-ruleta.jpg" alt="Ejemplo apuestas"></div>
            </div>
        </div>
        <p class="d-inline-flex gap-1">
            <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Tabla de apuestas
            </button>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card border-0">
                <?php
                include_once "includes/tabla.php"
                ?>
            </div>
        </div>

        <form action="apuesta.php" method="post">
            <label for="tipoApuesta">Tipo de apuesta</label>
            <select class="form-select" id="tipoApuesta" name="tipoApuesta">
                <option selected>Seleccione un opción</option>
                <option value="Roig/Negre">Roig/Negre</option>
                <option value="Parell/Imparell">Parell/Imparell</option>
                <option value="Pasa/Falta">Pasa/Falta</option>
                <option value="Pleno">Pleno</option>
                <option value="Docena">Docena</option>
                <option value="Columna">Columna</option>
                <option value="Dos docenes">Dos docenes</option>
                <option value="Dos columnes">Dos columnes</option>
                <option value="Seisena">Seisena</option>
                <option value="Cuadro">Cuadro (carrer)</option>
                <option value="Transversal">Transversal</option>
                <option value="Caballo">Caballo</option>
            </select>

            <!-- cambiar por automaticamente cambiar segun tipo de apuesta -->
            <div class="form-group" id="cambiarApuesta">
                <label for="queApuesta">Seleccione un tipo de apuesta.</label>
                <input class="form-control" type="text" placeholder="Seleccione un tipo de apuesta." disabled>
            </div>

            <div class="form-group" id="numCaballo"></div>

            <div class="input-group">
                <label class="input-group" for="dinero" id="dinero">Cantidad de dinero</label>
                <input type="number" class="form-control" id="dinero" name="dinero" value="50">
                <span class="input-group-text">€</span>
            </div>

            <?php
                if(!isset($_SESSION['saldo'])){
                    echo '
                        <div class="input-group">
                            <label class="input-group" for="saldo" id="saldo">Saldo</label>
                            <input type="number" class="form-control" id="saldo" name="saldo" value="1000">
                            <span class="input-group-text">€</span>
                        </div>
                    ';
                }
            ?>

            <button type="submit" class="btn btn-secondary" style="margin: 20px 0;">Enviar</button>
        </form>
    </div>
        <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>