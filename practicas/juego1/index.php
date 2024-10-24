<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de la Ruleta</title>
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="container" style="margin: 50px 0;">
            <div class="row align-items-center ">
                <div class="col"><img src="images/hero-ruleta.svg" alt=""></div>
                <div class="col-8"><img src="images/apuestas-ruleta.jpg" alt=""></div>
            </div>
        </div>
        <div class="container">
            <?php
                include_once "includes/tabla.php"
            ?>
        </div>
        
        <form action="" method="post">

            <label for="tipoApuesta">Tipo de apuesta</label>
            <select class="form-select" id="tipoApuesta" name="tipoApuesta">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>

            <!-- cambiar por automaticamente cambiar segun tipo de apuesta -->
            <div class="form-group">
                <label for="queApuesta">¿A que apuestas?</label>
                <input type="email" class="form-control" id="queApuesta" name="queApuesta">
            </div>

            <div class="input-group">
                <label class="input-group" for="exampleInputEmail1">Cantidad de dinero</label>
                <input type="text" class="form-control">
                <span class="input-group-text">€</span>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>