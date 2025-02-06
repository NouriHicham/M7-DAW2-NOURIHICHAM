<?php
   include_once 'Producte.class.php';

   class CarretCompra{
      public array $productes = [];

      public function afegirProducte($nom, $preu){
         array_push($this->productes, new Producte($nom, $preu));
      }

      public function total(){
         $total = 0;
         foreach($this->productes as $producte){
            $total += $producte->preu;
         }
         return '
            <td class="table-active">Total precio: </td>
            <td class="table-active">'.$total.' €</td>
            ';
      }

      public function mostrarProductes(){
         foreach($this->productes as $producte){
            echo '<tr>
                     <td>'.$producte->nom.'</td>
                     <td>'.$producte->preu.' €</td>
                  </tr>';
         }
      }
   }
?>