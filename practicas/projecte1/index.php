<?php
   //definir cada gormiti 
   class Gormiti{
      public string $nom;
      public int $hp;
      public int $atac;
      public int $defensa;
      public string $habilitat;

      public function __construct($nom, $hp, $atac, $defensa, $habilitat){
         $this->nom = $nom;
         $this->hp = $hp;
         $this->atac = $atac;
         $this->defensa = $defensa;
         $this->habilitat = $habilitat;
      }

      //reducir hp
      public function rebreDany($dany){
         $this->hp = $this->hp - $dany;
         return $this->hp;
      }

      //enviar daño
      public function atacar(){
         return $this->atac;
      }

      //cada habilidad definida
      public function activarHabilitat(){
         if($this->habilitat=="Flama Infernal"){

         }
      }

   }

   class Jugador{
      public string $nom;
      public string $gormiti;

      public function __construct($nom){
         $this->nom = $nom;
      }

      public function seleccionarGormiti($gormiti){
         $this->gormiti = $gormiti;
      }

      public function realitzarAccio($accio, $objectiu){
         //para luego
      }

   }

   //array con gormitis definidos
   $gormitis = [
      new Gormiti("Magmion", 120, 25, 15, "Flama Infernal"),
      new Gormiti("Carrapax", 150, 20, 20, "Escut de Corall"),
      new Gormiti("Noctis", 100, 30, 10, "Tempesta Nocturna"),
      new Gormiti("Tasarau", 130, 22, 18, "Arrels Enllaçadores"),
   ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   
</body>
</html>