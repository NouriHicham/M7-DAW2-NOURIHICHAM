<?php
   class Habitacio{
      public string $tipus;
      public int $preu;
      public bool $disponible;

      public function __construct($tipus, $preu, $disponible) {
         $this->tipus = $tipus;
         $this->preu = $preu;
         $this->disponible = $disponible;
      }

      public function mostrarInfo(){
         return $this->tipus." ".$this->preu." ".$this->disponible;
      }
   }
?>