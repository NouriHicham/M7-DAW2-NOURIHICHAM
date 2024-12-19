<?php
   class Llibre{
      public string $titol;
      public string $autor;

      public function __construct(){
         $this->titol = "El Señor de los Anillos";
         $this->autor = "J.R.R. Tolkien";
      }

      public function descripcio(){
         return ''.$this->titol.' autor: '.$this->autor.'';
      }

      public function getAutor(){
         return ''.$this->autor.'';
      }

   }

   class Persona{
      public string $nom;
      public int $edat;

      public function __construct($nom, $edat){
         $this->nom = $nom;
         $this->edat = $edat;
      }

      public function saludar(){
         return 'Hola, sóc '.$this->nom.' i tinc '.$this->edat.' anys.';
      }
   }

   class Producte{
      public string $nom;
      public int $preu;

      public function __construct($nom, $preu){
         $this->nom = $nom;
         $this->preu = $preu;
      }

      public function mostrarPreu(){
         return ''.$this->nom.', preu: '.$this->preu.'';
      }
   }

   class Calculadora{
      public function sumar(int $a, int $b){
         return $a + $b;
      }

      public function restar(int $a, int $b){
         return $a - $b;
      }

      public function multiplicar(int $a, int $b){
         return $a * $b;
      }

      public function dividir(int $a, int $b){
         return $a / $b;
      }
   }

   $productes = [
      $manzana = new Producte("Manzana", 1),
      $pera = new Producte("Pera", 2),
      $platano = new Producte("Platano", 3),
   ];

   class Animal{
      public string $nom;
      public string $tipus;

      public function __construct(string $nom, string $tipus){
         $this->nom = $nom;
         $this->tipus = $tipus;
      }

      public function descriure(){
         return 'Hem dic '.$this->nom.' y soc un '.$this->tipus.'';
      }

   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   
   <form action="" method="get">
      <div>
         <label for="nom">Nom</label>
         <input type="text" id="nom" name="nom">
      </div>
      <div>
         <label for="edat">Edat</label>
         <input type="number" id="edat" name="edat">
      </div>
      <button type="submit">Enviar</button>
   </form>
   <?php
      //7. Utilitzar HTML per interactuar amb la classe:
      if(isset($_GET['nom'])){
         $persona = new Persona($_GET['nom'], $_GET['edat']);
         echo $persona->saludar();
      }else{
         echo 'Escriba algo';
      }

      
   ?>

   <!-- taula productes -->
   <table style="border: 1px solid; margin-top: 20px;">
   <thead>
      <tr>
         <th>Producte</th>
         <th>Preu</th>
      </tr>
   </thead>
   <tbody>
   <?php
      foreach($productes as $producte){
         echo 
         '
         <tr>
            <td>'.$producte->nom.'</td>
            <td>'.$producte->preu.'€</td>
         </tr>
         ';
      }
   ?>
   </tbody>
   </table>

   <form action="" method="get" style="margin-top: 20px;">
      <div>
         <label for="nomAnimal">Nom</label>
         <input type="text" id="nomAnimal" name="nomAnimal">
      </div>
      <div>
         <label for="tipus">tipus</label>
         <input type="text" id="tipus" name="tipus">
      </div>
      <button type="submit">Enviar</button>
   </form>
   <?php
      //7. Utilitzar HTML per interactuar amb la classe:
      if(isset($_GET['nomAnimal'])){
         $animal = new Animal($_GET['nomAnimal'], $_GET['tipus']);
         echo $animal->descriure();
      }else{
         echo 'no animal';
      }

      
   ?>
</body>
</html>