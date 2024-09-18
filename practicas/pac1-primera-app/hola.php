<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo 7 - Práctica 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div><img src="logo-fpllefia.jpg" alt="logo"></div>
        <div class="titulo"><h1>Módulo 7 - Práctica 1. Mi primera aplicación en PHP</h1></div>
    </header>
    <main>
        <div class="imagenMia">
            <div><img src="yomismo.jpg" alt="yo_mismo"></div>
            <div><h2>Hicham Nouri</h2></div>
        </div>
        <div>
            <p>El primer recuadro son las siglas de PHP, un lenguaje de programacion.</p>
            <p>El segundo recuadro parace ser una funcion para que se imprima "Hello" más lo que se le envie a la funcion</p>
            <p>El tercer recuadro llama a la funcion enviandole "remote world"</p>
            <p>Y el último recuadro sera para ver informacion del php</p>
        </div>
    </main>
    <footer>
        <div>
            <div><p>Hicham Nouri Chahid</p></div>
            <div class="fechaa"><p>Hoy es: </p><p id="fechaActual"></p></div>
        </div>
    </footer>
    <div class="prueba"><a href="demostracion.php">LA PRUEBA</a></div>
    <script>
        fecha = new Date();
        anio = fecha.getFullYear();
        mes = fecha.getMonth() + 1;
        dia = fecha.getDate();
        document.getElementById("fechaActual").innerHTML = anio + "-" + mes + "-" + dia;
    </script>
</body>
</html>