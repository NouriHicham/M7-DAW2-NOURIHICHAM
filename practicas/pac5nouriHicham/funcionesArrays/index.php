<?php
    $array = [1,2,3,4,5,6,7,8,9];
    $arrayFrutas = ["platano", "manzana", "melocoton", "uvas", "platano", "manzana", "melocoton"];

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
        return array_filter($numeros, function($numero) use ($valor){
            return $valor < $numero;
        });
    }

    print_r(filtrarMayores($array, 5));
    echo "<br>";

    //4. Buscar un valor en un array

    function buscarEnArray($array, $valor){
        return in_array($valor, $array);
    }

    echo buscarEnArray($array, 6) ? 'true' : 'false';
    echo "<br>";

    //5. Contar elementos de un array

    function contarElementos($array){
        return count($array);
    }

    echo contarElementos($array);
    echo "<br>";

    //6. Obtener el valor máximo de un array

    function obtenerMaximo($numeros){
        return max($numeros);
    }

    echo obtenerMaximo($array);
    echo "<br>";

    //7. Obtener el valor mínimo de un array

    function obtenerMinimo($numeros){
        return min($numeros);
    }

    echo obtenerMinimo($array);
    echo "<br>";

    //8. Eliminar duplicados de un array

    function eliminarDuplicados($array){
        return array_unique($array);
    }

    print_r(eliminarDuplicados($arrayFrutas));
    echo "<br>";
    echo "<br>";

    //9. Combinar dos arrays

    function combinarArrays($array1, $array2){
        return array_merge($array1, $array2);
    }

    print_r(combinarArrays($array, $arrayFrutas));
    echo "<br>";
    echo "<br>";

    //10. Dividir un array en fragmentos

    function dividirArray($array, $tamanio){
        return array_chunk($array, $tamanio);
    }

    print_r(dividirArray($array, 3))


?>