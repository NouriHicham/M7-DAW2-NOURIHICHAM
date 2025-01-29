<?php
   class Partida{
      public int $num_jugadores;
      public int $num_cartas;
      public int $turno;
      public object $baraja;
      public object $carta_en_mesa;
      public array $array_jugadores;
      public string $sentido;

      public function __construct(int $num_jugadores, int $num_cartas, array $baraja){
         $this->num_jugadores = $num_jugadores;
         $this->num_cartas = $num_cartas;
         $this->array_jugadores = array();

         //crear jugadores
         for($i=0 ; $i<$this->num_jugadores ; $i++){
            array_push($this->array_jugadores, new Jugador($i));
         }

         //añadir cartas
         foreach($this->array_jugadores as $jugador){
            for($i=0 ; $i<$this->num_cartas ; $i++){
               $jugador->afegirCarta($baraja[$i]);
               array_splice($baraja, 1, 1);
            }
         }
      }

      public function jugar(){
         //mostrar mano de cada jugador
         echo '<div class="jugador">';
         foreach($this->array_jugadores as $jugador){
            echo $jugador->mostra_ma();
         }
         echo '</div>';
      }
   }
?>