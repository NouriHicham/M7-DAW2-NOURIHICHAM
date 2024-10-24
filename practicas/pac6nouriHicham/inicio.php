<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Mercadona</title>
    <!-- link css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">
    <div class="container text-center my-5">
        <h1>Bienvenido a Mercadona</h1>
        <p>Por favor, completa el siguiente formulario para continuar tu compra.</p>
    </div>

    <div class="container">
        <!-- AQUÍ PUEDES USAR UN FORM DE BOOTSTRAP 5 SENCILLO PARA PEDIR LOS DATOS: -->
        <!-- NOMBRE -->
        <!-- APELLIDOS -->
        <!-- NÚMERO DE TELÉFONO -->
        <!-- DNI -->
        <!-- CÓDIGO DE SOCIO -->
        <!-- CORREO ELECTRÓNICO -->
        <form action="index.php" method="post">
            <div class="input-group mb-2">
                <span class="input-group-text">Nombre</span>
                <input name="name" type="text" value="Hicham" aria-label="First name" class="form-control" >
            </div>
            <div class="input-group mb-2">
                <span class="input-group-text" id="inputGroup-sizing-default">Telefono</span>
                <input name="tlf" type="text" value="633333333" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-2">
                <span class="input-group-text" id="inputGroup-sizing-default">Url foto</span>
                <input name="url_img" type="text" value="https://this-person-does-not-exist.com/img/avatar-genf9e6431f1098207985f6dd8498116b46.jpg" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <button type="submit" class="btn btn-secondary">Enviar</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>