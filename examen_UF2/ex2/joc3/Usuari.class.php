<?php
   class Usuari{
      public $nom;
      public $edat;
      public $correu;

      public function __construct($nom, $edat, $correu) {
         $this->nom = $nom;
         $this->edat = $edat;
         $this->correu = $correu;
      }

      public function comprovarDades(){
         $comprovar = 0;
         if(is_numeric($this->edat)){
            $comprovar++;
         }

         $encontrarArroba = strpos($this->correu, '@');
         $encontrarPunto = strpos($this->correu, '.');
         if($encontrarArroba !== false && $encontrarPunto !== false){
            $comprovar++;
         }

         if($comprovar>=2){
            return true;
         }else{
            return false;
         }

      }

   }
?>