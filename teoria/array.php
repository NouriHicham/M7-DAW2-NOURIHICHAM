<?php
    //1.1 ARRAY ESCALAR INDEXADO
    $estudiantes = array("Didac", "Brian", "Lucia");
    $lista = array("Sulaiman", "Brian", "Dani");

    
    //var_dump($lista);
    print_r($lista);

    //DESDE LA VERSION 5.4 PHP
    $lista2 = ["Didac", "Kevin", "David", 87, 32, 43, 23.43, true];
    echo "<br>";
    echo ($lista[1]);

    //cambiar un valor
    $lista2[2]="Yehor";
    echo "<br>";
    echo $lista2[2];

    //añadir elementos a un array
    $colores = ["rojo", "azul", "amarillo"];
    $colores[] = "naranja";
    echo "<br>";
    print_r($colores);

    //2. array asociativo
    $tutor = [
        "nombre" => "Albert",
        "apellidos" => "Arreblos Sans",
        "edad" => 36
    ];

    echo "<br>";
    echo $tutor["apellidos"];

    $tutor["edad"] = 18;

    echo "<br>";
    print_r(array_keys($tutor));

    //Recorrer array con for

    $numeros = [1,2,3,4,5,6,7,8,9];

    echo "<br>";
    for($i=0;$i<count($numeros);$i++){
        echo $numeros[$i]," ";
    }

    //recorrer array con un foreach
    $numeros = [1,2,3,4,5,6,7,8,9];
    foreach($numeros as $num){
        //echo $num . " ";
        echo ($num * 2) . " ";
    }

    //recorrer un array asociativa
    $ciudades= [
        "Paris" => "Francia",
        "Barcelona" => "Espanya",
        "Londres" => "Reino Unido"
    ];

    foreach($ciudades as $ciudad => $pais){
        echo "<br>";
        //echo "la ciudad de {$ciudad} esta en {$pais}";
        if($ciudad=="Barcelona"){
            echo "la ciudad de {$ciudad} esta en {$pais}";
        }
    }

    //foreach en arrays multidimensionales
    //Crea un array multidimensional de estudiantes y sus notas, y recorre cada estudiante con foreach para mostrar sus datos.
    $estudiantes = [
        ["nombre" => "Anna", "nota" => 10, "genero" => "F"],
        ["nombre" => "Dani", "nota" => 10, "genero" => "M"],
        ["nombre" => "Yehor", "nota" => 11, "genero" => "M"],
        ["nombre" => "Lucia", "nota" => 9, "genero" => "F"],
        ["nombre" => "David", "nota" => 12, "genero" => "M"]
    ];

    foreach ($estudiantes as $estudiantes){
        echo "<br>";
        echo "El estudiante: {$estudiantes["nombre"]} tiene un {$estudiantes["nota"]}";
    }
?>