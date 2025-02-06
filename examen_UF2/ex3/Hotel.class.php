<?php

   include_once 'Habitacio.class.php';

   class Hotel{
      public array $habitacions = [];

      public function __construct() {
         $habitacions[] = new Habitacio("doble", 1000, true);
         $habitacions[] = new Habitacio("suit", 800, true);
         $habitacions[] = new Habitacio("individual", 500, false);
         $habitacions[] = new Habitacio("individual", 600, true);
         $habitacions[] = new Habitacio("doble", 1200, true);
         $habitacions[] = new Habitacio("suit", 900, false);
      }

      public function llistarHabitacions(){
         foreach($this->habitacions as $habitacio){
            if($habitacio->disponible){
               echo $habitacio->mostrarInfo();
            }
         }
      }

      public function reservarHabitacio($tipus){
         foreach($this->habitacions as $habitacio){
            if($habitacio->tipus == $tipus){
               $habitacio->disponible = false;
            }
         }
      }

      public function mostrarDisponibilitat(){
         foreach($this->habitacions as $habitacio){
            echo $habitacio->mostrarInfo();
         }
      }
   }
?>