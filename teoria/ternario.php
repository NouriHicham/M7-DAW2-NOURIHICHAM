<?php
    //ternario: (CONDICION) ? valor_si_verdadero : valor_si_falso; 
    $nota = 75;
    $estatus = ($nota >= 90) ? "A" : (($nota >= 80) ? "B" : (($nota >= 70) ? "C" : "Reprobado"));
    echo "Tu estatus es: " . $estatus; // Esto imprimirá "Tu estatus es: C"

    
    $es_admin = true;
    $permisos = ($es_admin) ? "Acceso completo" : "Acceso limitado";
?>