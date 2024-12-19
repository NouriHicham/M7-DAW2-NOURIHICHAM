<?php
   //1. Definició d'una classe bàsica:
   class Cotxe{
      public string $marca;
      public string $model;

      public function __construct(){
         $this->marca = 'Toyota';
         $this->model = 'Corolla';
      }

      //2. Afegir valors als atributs:
      public function descripcio(){
         return 'marca: '.$this->marca.' y modelo: '.$this->model.'';
      }

   }
   $cotxe = new Cotxe();
   echo $cotxe->descripcio();

   echo '<br>';
   //3. Utilitzar un constructor
   class Persona{
      public string $nom;
      public int $edat;

      public function __construct($nom, $edat){
         $this->nom = $nom;
         $this->edat = $edat;
      }

      public function bienvenida(){
         return 'Hola '.$this->nom.', '.$this->edat.' años';
      }

   }

   $persona = new Persona("Hicham", 23);
   echo $persona->bienvenida();

   echo '<br>';
   //4. Tipatge estricte
   class Persona2{

      public function bienvenida(string $nom, int $edat){
         return 'Hola '.$nom.', '.$edat.' años';
      }

   }

   $persona2 = new Persona2();
   echo $persona2->bienvenida("Hicham", 23);

   //5. Interacció d’objectes
   $persona3 = new Persona("Ivan", 56);
   $persona4 = new Persona("Jaume", 54);

   echo '<br>';
   echo $persona3->bienvenida();
   echo '<br>';
   echo $persona4->bienvenida();
   echo '<br>';

   //6. Crear una classe amb mètodes que accepten paràmetres

   class Calculadora{
      public function sumar (int $a, int $b){
         return $a + $b;
      }
   }

   $sumar = new Calculadora();
   echo $sumar->sumar(5,6);

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
      if($_SERVER['REQUEST_METHOD']=="GET"){
         $persona5 = new Persona($_GET['nom'], $_GET['edat']);
         echo $persona5->bienvenida();
      }
   ?>
</body>
</html>

<?php
   echo '<br>';
   //8. Atributs personalitzats
   class Animal{
      public string $nom;
      public string $tipus;

      public function __construct(string $nom, string $tipus){
         $this->nom = $nom;
         $this->tipus = $tipus;
      }
      //9. Utilitzar mètodes amb retorns personalitzats
      public function saludar(){
         return 'Hola, sóc un '.$this->tipus.' i em dic '.$this->nom.'';
      }
   }

   $animal = new Animal("Leo","capibara");
   echo $animal->saludar();
?>