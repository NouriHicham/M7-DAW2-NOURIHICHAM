<?php
   class Producte {
      public string $nom;
      public int $preu;
      
      public function __construct($nom, $preu) {
         $this->nom = $nom;
         $this->preu = $preu;
      }
      
   }
?>