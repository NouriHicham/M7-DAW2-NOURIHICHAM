<?php
    //1. Generar saludo personalizado
    function generarSaludo($nombre){
        return "<h1>Hola, '.$nombre.'!</h1>";
    };

    echo generarSaludo("Hicham");

    //2. Calcular el precio total de un producto
    function calcularTotal($precio, $cantidad, $impuesto){
        return (($precio*$impuesto+$precio)*$cantidad);
    }

    echo calcularTotal(12.45, 5, 0.15);
    echo "<br>";

    //3. Generar un resumen acortado
    function generarResumen($texto, $limite){
        return substr($texto, 0,$limite).'...';
    }

    echo generarResumen("Hola mundo cruel", 10);
    echo "<br>";

    //4. Conversión de temperaturas
    function convertirTemperatura($temperatura, $escala){
        if($escala=="C"){
            return ''.(($temperatura*9/5)+32).'ºF';
        }else if($escala=="F"){
            return ''.(($temperatura-32)*5/9).'ºC';
        }else{
            return "Variable incorrecta";
        }
    }

    echo convertirTemperatura(20,"C");
    echo "<br>";
    echo convertirTemperatura(122,"F");
    echo "<br>";

    //5. Cálculo de edad a partir del año de nacimiento
    function calcularEdad($anioNacimiento){
        return 2024-$anioNacimiento;
    }

    echo calcularEdad(2001);
    echo "<br>";

    //6. Determinar si un número es par o impar
    function esPar($numero){
        $par = (($numero%2)==0) ? ''.$numero.' Es par' : ''.$numero.'Es impar';
        return $par;
    }

    echo esPar(rand(1,10));
    echo "<br>";

    //7. Generar enlace de descarga
    function generarEnlaceDescarga($archivo){
        return '<a href="'.$archivo.'" download>Descargar</a>';
    }

    echo generarEnlaceDescarga("foto.jpg");


?>