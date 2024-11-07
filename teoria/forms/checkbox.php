<?php
   '<form action="index.php" method="POST">

    <!-- <label for="asignatura">Asignatura</label>
    <select name="asignatura[]" id="asignatura" multiple >
        <option value="Ingles">Inglés</option>
        <option value="Matematicas">Matematicas</option>
        <option value="Ciencia">Ciencia</option>
        <option value="Lengua">Lengua</option>
    </select> -->
    <br><br>

    <label for="opcion-1">
        <input type="checkbox" value="Manzana" id="opcion-1" name="frutas[]">Manzana
    </label>
    <label for="opcion-2">
        <input type="checkbox" value="Platano" id="opcion-2" name="frutas[]">Platano
    </label>
    <label for="opcion-3">
        <input type="checkbox" value="Naranja" id="opcion-3" name="frutas[]">Naranja
    </label>
    <label for="opcion-4">
        <input type="checkbox" value="Sandia" id="opcion-4" name="frutas[]">Sandia
    </label>

    <button type="submit">Enviar</button>


</form>'
?>