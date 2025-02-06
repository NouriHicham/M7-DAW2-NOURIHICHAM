<?php
   class Factura{
      public string $client;
      public string $producte;
      public int $quantitat;
      public int $preuUnitari;

      public function __construct($client, $producte, $quantitat, $preuUnitari) {
         $this->client = $client;
         $this->producte = $producte;
         $this->quantitat = $quantitat;
         $this->preuUnitari = $preuUnitari;
      }

      public function calcularTotal(){
         return $this->preuUnitari * $this->quantitat;
      }

      public function aplicarDescompte($percentatge){
         $total = $this->calcularTotal();
         $descuento = $total * ($percentatge / 100);
         return $total - $descuento;
      }
   }
?>