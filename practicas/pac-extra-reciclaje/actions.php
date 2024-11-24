<?php
session_start();

if(!isset($_SESSION['basura'])){
   $_SESSION['arrayBasuras']=
   [
      ["name" => "Glass", "amount" => 0],
      ["name" => "Organic", "amount" => 0],
      ["name" => "Paper", "amount" => 0],
      ["name" => "Plastic", "amount" => 0],
   ];
   $_SESSION['contador'] = 0;
   //llenamos el array con ls nombres de l'array "arrayBasuras", pero seleccionandolo de manera aleatoria 
   $_SESSION['basura'] = [];
   for($i=0;$i<5;$i++){
      $numRand = rand(0,3);
      array_push($_SESSION['basura'], $_SESSION['arrayBasuras'][$numRand]["name"]);
   }
}

function vaciarBasura(){
   foreach($_SESSION['arrayBasuras'] as &$arraybasuras){
      $arraybasuras["amount"] = 0;
   }
   $_SESSION['contador']++;
}

function llenarBasura($name){

   foreach($_SESSION['arrayBasuras'] as &$arraybasuras){ //preguntar profe (&)

      if($name==$arraybasuras["name"]){
         if($arraybasuras["amount"]<7){
            $arraybasuras["amount"]++;
            $error = "";
            llenarArray();
         }else{
            $error = "Basura llena o no coincide con el boton";
         }
      }
   }
   unset($arraybasuras); //preguntar profe

}

function llenarArray(){
   array_shift($_SESSION['basura']);

   $numRand = rand(0,3);
   $_SESSION['basura'][4] = $_SESSION['arrayBasuras'][$numRand]["name"];
}

?>