<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de la Ruleta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .imagen{
            animation: rotate-animation 2.5s linear infinite;
        }

        @keyframes rotate-animation{
            from{
                transform: rotate(0deg);
            }
            to{
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
                <option value="0">Roig/Negre</option>
                <option value="1">Parell/Imparell</option>
                <option value="2">Pasa/Falta</option>
                <option value="3">Pleno</option>
                <option value="4">Docena</option>
                <option value="5">Columna</option>
                <option value="6">Dos docenes</option>
                <option value="7">Dos columnes</option>
                <option value="8">Seisena</option>
                <option value="9">Cuadro (carrer)</option>
                <option value="10">Transversal</option>
                <option value="11">Caballo</option>
            </select>

            <!-- cambiar por automaticamente cambiar segun tipo de apuesta -->
            <div class="form-group" id="cambiarApuesta">
                <label for="queApuesta">Seleccione un tipo de apuesta.</label>
                <input class="form-control" type="text" placeholder="Seleccione un tipo de apuesta." disabled>
            </div>

            <div class="form-group" id="numCaballo"></div>

            <div class="input-group">
                <label class="input-group" for="dinero" id="dinero">Cantidad de dinero</label>
                <input type="text" class="form-control" id="dinero" name="dinero">
                <span class="input-group-text">€</span>
            </div>

            <button type="submit" class="btn btn-secondary" style="margin: 20px 0;">Enviar</button>
        </form>
    </div>
    <script>

        function numerosContiguos(num){
            let arrayIzq = [4,7,10,13,16,19,22,25,28,31]
            let arrayMed = [5,8,11,14,17,20,23,26,29,32]
            let arrayDer = [6,9,12,15,18,21,24,27,30,33]
            let arrayNum = []

            if(arrayIzq.includes(num)==true){
                arrayNum.push(num + 1)
                arrayNum.push(num + 3)
                arrayNum.push(num - 3)
            }

            return arrayNum
        }

        document.querySelector("#tipoApuesta").addEventListener("change", function(){
            //console.log(document.querySelector("#tipoApuesta").value)

            let cambioApuesta = document.querySelector("#cambiarApuesta")

            cambioApuesta.innerHTML = `<label for="queApuesta">¿A que apuestas?</label>`
            switch (document.querySelector("#tipoApuesta").value){
                case "0":
                    //Roig/Negre
                    cambioApuesta.innerHTML +=    `<select class="form-select" id="queApuesta" name="queApuesta">
                                                        <option selected>Seleccione un opción</option>
                                                        <option value="roig">Roig</option>
                                                        <option value="negre">Negre</option>
                                                    </select>`
                    break;
                case "1":
                    //parell/imparell
                    cambioApuesta.innerHTML +=    `<select class="form-select" id="queApuesta" name="queApuesta">
                                                        <option selected>Seleccione un opción</option>
                                                        <option value="parell">Parell</option>
                                                        <option value="imparell">Imparell</option>
                                                    </select>`
                    break;
                case "2":
                    // Pasa/Falta
                    cambioApuesta.innerHTML += `<select class="form-select" id="queApuesta" name="queApuesta">
                                                    <option selected>Seleccione una opción</option>
                                                    <option value="falta">Falta (1-18)</option>
                                                    <option value="pasa">Pasa (19-36)</option>                                                
                                                </select>`;
                    break;
                case "3":
                    // Pleno
                    cambioApuesta.innerHTML += `<input type="number" class="form-control" id="queApuesta" name="queApuesta" min="0" max="36">`;
                    break;
                case "4":
                    // Docena
                    cambioApuesta.innerHTML += `<select class="form-select" id="queApuesta" name="queApuesta">
                                                    <option selected>Seleccione una opción</option>
                                                    <option value="docena1">1-12</option>
                                                    <option value="docena2">13-24</option>
                                                    <option value="docena3">25-36</option>
                                                </select>`;
                    break;
                case "5":
                    // Columna
                    cambioApuesta.innerHTML += `<select class="form-select" id="queApuesta" name="queApuesta">
                                                    <option selected>Seleccione una opción</option>
                                                    <option value="columna1">Columna 1</option>
                                                    <option value="columna2">Columna 2</option>
                                                    <option value="columna3">Columna 3</option>
                                                </select>`;
                    break;
                case "6":
                    // Dos docenes
                    cambioApuesta.innerHTML += `<select class="form-select" id="queApuesta" name="queApuesta">
                                                    <option selected>Seleccione una opción</option>
                                                    <option value="dosDocenas1">1-12 i 13-24</option>
                                                    <option value="dosDocenas2">13-24 i 25-36</option>
                                                    <option value="dosDocenas3">1-12 i 25-36</option>
                                                </select>`;
                    break;
                case "7":
                    // Dos columnes
                    cambioApuesta.innerHTML += `<select class="form-select" id="queApuesta" name="queApuesta">
                                                    <option selected>Seleccione una opción</option>
                                                    <option value="dosColumnes1">Columna 1 i 2</option>
                                                    <option value="dosColumnes2">Columna 2 i 3</option>
                                                    <option value="dosColumnes3">Columna 1 i 3</option>
                                                </select>`;
                    break;
                case "8":
                    // Seisena
                    cambioApuesta.innerHTML += `<select class="form-select" id="queApuesta" name="queApuesta">
                                                    <option selected>Seleccione una opción</option>
                                                    <option value="seisena1">1, 2, 3, 4, 5, 6</option>
                                                    <option value="seisena2">4, 5, 6, 7, 8, 9</option>
                                                    <option value="seisena3">7, 8, 9, 10, 11, 12</option>
                                                    <option value="seisena4">10, 11, 12, 13, 14, 15</option>
                                                    <option value="seisena5">13, 14, 15, 16, 17, 18</option>
                                                    <option value="seisena6">16, 17, 18, 19, 20, 21</option>
                                                    <option value="seisena7">19, 20, 21, 22, 23, 24</option>
                                                    <option value="seisena8">22, 23, 24, 25, 26, 27</option>
                                                    <option value="seisena9">25, 26, 27, 28, 29, 30</option>
                                                    <option value="seisena10">28, 29, 30, 31, 32, 33</option>
                                                    <option value="seisena11">31, 32, 33, 34, 35, 36</option>
                                                </select>`;
                    break;
                case "9":
                    // Cuadro (carrer)
                    cambioApuesta.innerHTML += `<input type="text" class="form-control" id="queApuesta" name="queApuesta" placeholder="Ej: 1, 2, 4, 5">`;
                    break;
                case "10":
                    // Transversal
                    cambioApuesta.innerHTML += `<select class="form-select" id="queApuesta" name="queApuesta">
                                                    <option selected>Seleccione una opción</option>
                                                    <option value="transversal1">0, 1, 2</option>
                                                    <option value="transversal2">0, 2, 3</option>
                                                    <option value="transversal3">1, 2, 3</option>
                                                    <option value="transversal4">4, 5, 6</option>
                                                    <option value="transversal5">7, 8, 9</option>
                                                    <option value="transversal6">10, 11, 12</option>
                                                    <option value="transversal7">13, 14, 15</option>
                                                    <option value="transversal8">16, 17, 18</option>
                                                    <option value="transversal9">19, 20, 21</option>
                                                    <option value="transversal10">22, 23, 24</option>
                                                    <option value="transversal11">25, 26, 27</option>
                                                    <option value="transversal12">28, 29, 30</option>
                                                    <option value="transversal13">31, 32, 33</option>
                                                    <option value="transversal14">34, 35, 36</option>
                                                </select>`;
                    break;
                case "11":
                    // Caballo

                    cambioApuesta.innerHTML += `<input type="number" class="form-control" id="caballo" name="queApuesta" min="1" max="36">`;

                    document.querySelector("#caballo").addEventListener('input', function(){
                        document.querySelector("#numCaballo").innerHTML = ` <label for="numCaballo">Seleccione un numero contiguo.</label>
                                                                            <select class="form-select" id="queApuesta" name="queApuesta">
                                                                                <option selected>Seleccione una numero contiguo</option>`;

                        let arraynumeros = numerosContiguos(parseInt(document.querySelector("#caballo").value))
                        //console.log(arraynumeros)

                        for(let i=0;i<arraynumeros.length;i++){
                            document.querySelector("#numCaballo").innerHTML += `<option value="caballo${i}">${arraynumeros[i]}</option>`
                        }
                        document.querySelector("#numCaballo").innerHTML += `</select>`

                    })

                    break;
                default:
                    cambioApuesta.innerHTML = `<label for="queApuesta">Seleccione un tipo de apuesta.</label>
                    <input class="form-control" type="text" placeholder="Seleccione un tipo de apuesta." disabled>`;
            }

            //cuadro, caballo

        })


        

    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>