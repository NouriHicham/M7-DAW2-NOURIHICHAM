<?php

$cadena = "Hola mundo";

//1. longitud de caracteres --> strlen()
echo strlen($cadena);
echo "<br>";

//2. strpos
echo strpos($cadena, "mundo");
echo "<br>";

//3. str_replace
echo str_replace("mundo", "Badalona", $cadena);
echo "<br>";

//4. strtolower
echo strtolower($cadena);
echo "<br>";

//5. strtoupper
echo strtoupper($cadena);
echo "<br>";

//6. ucfirst
echo ucfirst($cadena);
echo "<br>";

//7. ucwords
echo ucwords($cadena);
echo "<br>";

//8. trim: elimina espacio en blanco innecesarios
$cadena2 = "              leo            messi               ";
echo trim($cadena2);
echo "<br>";

//9. substr(): obtiene una parte de una cadena de la posicion que le digas
echo substr($cadena2, 14,17);
echo "<br>";

//10. implode: separa una lista con un limitador que tu pongas
$array = ["Hola", "Mundo", "PHP"];
echo implode(" ", $array);
echo "<br>";

//11. explode: transforma una cadena en un array (inverso implode)
$cadena = "Hola,Mundo,PHP";
$array = explode(",",$cadena);
print_r($array);
echo "<br>";

foreach ($array as $a){
    echo $a;
}
echo "<br>";

// 12. in_array(): mira si existe o no en un array
$os = ["Mac", "NT", "Irix", "Linux"];
if( in_array("Irix", $os)){
    echo "Existe Irix";
}
echo "<br>";

//13. array_search: busca un valor en un array y devuelve la clave correspondiente, si no esta saca false
$array = ["manzana", "pera", "naranja"];
echo array_search("naranja", $array);
echo "<br>";

//14. array_map
$arraymap = [1, 2, 3, 4];
$resultado = array_map(function($numero){
    return $numero * 2;
}, $arraymap);
print_r($resultado); //Resultado: Array ( [0] => 2 [1] => 4 [2] => 6 [3] => 8 )

//15. array_filter()
$arrayfilter = [1,2,3,4,5,6,7,8];
$resultado = array_filter($arrayfilter, function($n){
    return $n%2 == 0;
});
print_r($resultado);
?>