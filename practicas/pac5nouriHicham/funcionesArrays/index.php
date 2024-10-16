<?php
    $array = [1,2,3,4,5,6,7,8,9];
    $arrayFrutas = ["platano", "manzana", "melocoton", "uvas"];

    //1. Sumar valores de un array
    function sumarArray($numeros){
        return array_sum($numeros);
    }

    echo sumarArray($array);
    echo "<br>";

    //2. Ordenar un array alfabéticamente
    function ordenarArrayAlfabetico($nombres){
        sort($nombres);
        print_r($nombres);
    }

    ordenarArrayAlfabetico($arrayFrutas);
    echo "<br>";

    //3. Filtrar elementos mayores a un valor

    function filtrarMayores($numeros, $valor){
        return array_filter($numeros, function($numero){
            return $valor < $numero;
        });
    }

    print_r(filtrarMayores($array, 5))


?>