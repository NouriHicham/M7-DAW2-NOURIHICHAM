<?php
    //1. Convertir texto a mayúsculas
    function convertirMayusculas($texto){
        return strtoupper($texto);
    }

    echo convertirMayusculas("hola mundo");
    echo "<br>";

    //2. Contar palabras en un texto
    function contarPalabras($texto){
        return str_word_count($texto);
    }

    echo contarPalabras("hola mundo");
    echo "<br>";

    //3. Obtener una subcadena
    function obtenerSubcadena($texto, $inicio, $longitud){
        return substr($texto, $inicio, $longitud);
    }

    echo obtenerSubcadena("hola mundo", 3, 5);
    echo "<br>";
    
    //4. Reemplazar palabras en una frase
    function reemplazarPalabras($texto, $buscar, $reemplazar){
        return str_replace($buscar, $reemplazar, $texto);
    }

    echo reemplazarPalabras("hola mundo", "mundo", "marmota");
    echo "<br>";

    //5. Invertir una cadena de texto
    function invertirTexto($texto){
        return strrev($texto);
    }

    echo invertirTexto("hola mundo");
    echo "<br>";

    //6. Comparar dos strings
    function compararStrings($cadena1, $cadena2){
        if(strcmp($cadena1,$cadena2)==0){
            return "son iguales";
        }else{
            return "no son iguales";
        }
        
    }

    echo compararStrings("hola mundo", "hola mundo");
    echo "<br>";
    echo compararStrings("hola mundo", "Hola mundo");
    echo "<br>";

    //7. Eliminar espacios en blanco
    function eliminarEspacios($texto){
        return trim($texto);
    }

    echo eliminarEspacios("     hola mundo       ");
    echo "<br>";

    //8. Contar ocurrencias de una palabra en un texto
    function contarOcurrencias($texto, $palabra){
        return substr_count($texto, $palabra);
    }

    echo contarOcurrencias("hola mundo mundo", "mundo");
    echo "<br>";

    //9. Dividir una cadena en palabras
    function dividirPalabras($texto){
        return explode(" ", $texto);
    }


    print_r(dividirPalabras("hola bendito mundo"));


?>