
function numerosContiguos(num) {
   let arrayIzq = [4, 7, 10, 13, 16, 19, 22, 25, 28, 31]
   let arrayMed = [5, 8, 11, 14, 17, 20, 23, 26, 29, 32]
   let arrayDer = [6, 9, 12, 15, 18, 21, 24, 27, 30, 33]
   let arrayNum = []

   if (arrayIzq.includes(num) == true) {
         arrayNum.push(num + 1)
         arrayNum.push(num + 3)
         arrayNum.push(num - 3)
   } else if (arrayMed.includes(num) == true) {
         arrayNum.push(num + 1)
         arrayNum.push(num - 1)
         arrayNum.push(num + 3)
         arrayNum.push(num - 3)
   } else if (arrayDer.includes(num) == true) {
         arrayNum.push(num - 1)
         arrayNum.push(num + 3)
         arrayNum.push(num - 3)
   } else if (num == 1) {
         arrayNum.push(num + 1)
         arrayNum.push(num + 3)
   } else if (num == 2) {
         arrayNum.push(num + 1)
         arrayNum.push(num - 1)
         arrayNum.push(num + 3)
   } else if (num == 3) {
         arrayNum.push(num - 1)
         arrayNum.push(num + 3)
   } else if (num == 34) {
         arrayNum.push(num + 1)
         arrayNum.push(num - 3)
   } else if (num == 35) {
         arrayNum.push(num + 1)
         arrayNum.push(num - 1)
   } else if (num == 36) {
         arrayNum.push(num - 1)
         arrayNum.push(num - 3)
   } else {
         arrayNum.push(0)
   }

   return arrayNum
}

document.querySelector("#tipoApuesta").addEventListener("change", function() {
   //console.log(document.querySelector("#tipoApuesta").value)

   let cambioApuesta = document.querySelector("#cambiarApuesta")

   cambioApuesta.innerHTML = `<label for="queApuesta">¿A que apuestas?</label>`
   switch (document.querySelector("#tipoApuesta").value) {
     case "Roig/Negre":
       //Roig/Negre
       cambioApuesta.innerHTML += `<select class="form-select" id="queApuesta" name="queApuesta">
                                                <option selected>Seleccione un opción</option>
                                                <option value="rojo">Rojo</option>
                                                <option value="negro">Negro</option>
                                             </select>`;
       break;
     case "Parell/Imparell":
       //parell/imparell
       cambioApuesta.innerHTML += `<select class="form-select" id="queApuesta" name="queApuesta">
                                                <option selected>Seleccione un opción</option>
                                                <option value="par">Par</option>
                                                <option value="impar">Impar</option>
                                             </select>`;
       break;
     case "Pasa/Falta":
       // Pasa/Falta
       cambioApuesta.innerHTML += `<select class="form-select" id="queApuesta" name="queApuesta">
                                             <option selected>Seleccione una opción</option>
                                             <option value="falta">Falta (1-18)</option>
                                             <option value="pasa">Pasa (19-36)</option>                                                
                                       </select>`;
       break;
     case "Pleno":
       // Pleno
       cambioApuesta.innerHTML += `<input type="number" class="form-control" id="queApuesta" name="queApuesta" min="0" max="36">`;
       break;
     case "Docena":
       // Docena
       cambioApuesta.innerHTML += `<select class="form-select" id="queApuesta" name="queApuesta">
                                             <option selected>Seleccione una opción</option>
                                             <option value="docena1">1-12</option>
                                             <option value="docena2">13-24</option>
                                             <option value="docena3">25-36</option>
                                       </select>`;
       break;
     case "Columna":
       // Columna
       cambioApuesta.innerHTML += `<select class="form-select" id="queApuesta" name="queApuesta">
                                             <option selected>Seleccione una opción</option>
                                             <option value="columna1">Columna 1</option>
                                             <option value="columna2">Columna 2</option>
                                             <option value="columna3">Columna 3</option>
                                       </select>`;
       break;
     case "Dos docenes":
       // Dos docenes
       cambioApuesta.innerHTML += `<select class="form-select" id="queApuesta" name="queApuesta">
                                             <option selected>Seleccione una opción</option>
                                             <option value="dosDocenas1">1-12 i 13-24</option>
                                             <option value="dosDocenas2">13-24 i 25-36</option>
                                             <option value="dosDocenas3">1-12 i 25-36</option>
                                       </select>`;
       break;
     case "Dos columnes":
       // Dos columnes
       cambioApuesta.innerHTML += `<select class="form-select" id="queApuesta" name="queApuesta">
                                             <option selected>Seleccione una opción</option>
                                             <option value="dosColumnes1">Columna 1 i 2</option>
                                             <option value="dosColumnes2">Columna 2 i 3</option>
                                       </select>`;
       break;
     case "Seisena":
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
     case "Cuadro":
       // Cuadro (carré)
       cambioApuesta.innerHTML += `<select class="form-select" id="queApuesta" name="queApuesta">
                                     <option selected>Seleccione una opción</option>
                                     <option value="cuadro1">1, 2, 4, 5</option>
                                     <option value="cuadro2">2, 3, 5, 6</option>
                                     <option value="cuadro3">4, 5, 7, 8</option>
                                     <option value="cuadro4">5, 6, 8, 9</option>
                                     <option value="cuadro5">7, 8, 10, 11</option>
                                     <option value="cuadro6">8, 9, 11, 12</option>
                                     <option value="cuadro7">10, 11, 13, 14</option>
                                     <option value="cuadro8">11, 12, 14, 15</option>
                                     <option value="cuadro9">13, 14, 16, 17</option>
                                     <option value="cuadro10">14, 15, 17, 18</option>
                                     <option value="cuadro11">16, 17, 19, 20</option>
                                     <option value="cuadro12">17, 18, 20, 21</option>
                                     <option value="cuadro13">19, 20, 22, 23</option>
                                     <option value="cuadro14">20, 21, 23, 24</option>
                                     <option value="cuadro15">22, 23, 25, 26</option>
                                     <option value="cuadro16">23, 24, 26, 27</option>
                                     <option value="cuadro17">25, 26, 28, 29</option>
                                     <option value="cuadro18">26, 27, 29, 30</option>
                                     <option value="cuadro19">28, 29, 31, 32</option>
                                     <option value="cuadro20">29, 30, 32, 33</option>
                                     <option value="cuadro21">31, 32, 34, 35</option>
                                     <option value="cuadro22">32, 33, 35, 36</option>
                                </select>`;
       break;
     case "Transversal":
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
     case "Caballo":
       // Caballo

       cambioApuesta.innerHTML += `<input type="number" class="form-control" id="caballo" name="queApuesta" min="1" max="36">`;

       document
         .querySelector("#caballo")
         .addEventListener("input", function () {
           //paso el numero del primer input a la funcion numerosContiguos para crear una array con todos los numeros que podra elegir
           let arraynumeros = numerosContiguos(
             parseInt(document.querySelector("#caballo").value)
           );

           let select = ` <label for="numCaballo">Seleccione un numero contiguo.</label>
                                 <select class="form-select" id="queApuesta" name="queApuesta2">
                                 <option selected>Seleccione una numero contiguo</option>`;

           //console.log(arraynumeros)

           for (let i = 0; i < arraynumeros.length; i++) {
             select += `<option value="${arraynumeros[i]}">${arraynumeros[i]}</option>`;
           }
           select += `</select>`;

           document.querySelector("#numCaballo").innerHTML = select;
         });

       break;
     default:
       cambioApuesta.innerHTML = `<label for="queApuesta">Seleccione un tipo de apuesta.</label>
            <input class="form-control" type="text" placeholder="Seleccione un tipo de apuesta." disabled>`;
   }

})