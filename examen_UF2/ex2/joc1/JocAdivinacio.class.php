<?php

   class JocAdivinacio {
      public $numero;
      public $intentos;

      public function __construct() {
         $this->numero = rand(1, 20);
         $this->intentos = 0;
      }

      public function comprobar($numero) {
         //printf("numero: ".$this->numero." ");
         $this->intentos++;
         //printf("intentos: ".$this->intentos);
         if ($numero == $this->numero) {
            return true;
         } else if($numero < $this->numero) {
            echo "<h2>El numero es mayor</h2>";
            return false;
         } else if($numero > $this->numero) {
            echo "<h2>El numero es menor</h2>";
            return false;
         } else {
            return false;
         }
      }
   }
?>