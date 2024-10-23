<?php
    $nombre="Juan";

    echo (strlen($nombre)<1) ? '<input type="text" id="name" name="name" value="Ingrese su nombre">' : '<input type="text" id="name" name="name" value="'.$nombre.'">';

    //echo '<input type="text" id="name" name="name" value="'.$nombre.'">';
?>