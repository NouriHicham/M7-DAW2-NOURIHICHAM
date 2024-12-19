<?php
   //10. Un exemple avançat amb interacció

   class Producte{
      public string $nom;
      public int $preu;

      public function __construct(string $nom, int $preu)
      {
         $this->nom = $nom;
         $this->preu = $preu;
      }
   }

   $productes = [
      $manzana = new Producte("Manzana", 1),
      $pera = new Producte("Pera", 2),
      $platano = new Producte("Platano", 3),
   ]
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <ul>
   <?php
      foreach($productes as $producte){
         echo '<li>'.$producte->nom.', cuesta '.$producte->preu.'€</li>';
      }
   ?>
   </ul>
</body>
</html>