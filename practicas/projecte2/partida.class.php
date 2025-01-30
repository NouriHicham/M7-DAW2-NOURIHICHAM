<?php
   class Partida{
      public int $num_jugadores;
      public int $num_cartas;
      public int $turno;
      public array $baraja;
      public object $carta_en_mesa;
      public array $array_jugadores;
      public string $sentido;

      public function __construct(int $num_jugadores, int $num_cartas, array $baraja){
         $this->num_jugadores = $num_jugadores;
         $this->num_cartas = $num_cartas;
         $this->array_jugadores = array();
         $this->baraja = $baraja;
         $this->turno = 0;
         $this->sentido = 'derecha';

         //crear jugadores
         for($i=0 ; $i<$this->num_jugadores ; $i++){
            array_push($this->array_jugadores, new Jugador($i));
         }

         //añadir cartas
         foreach($this->array_jugadores as $jugador){
            for($i=0 ; $i < $this->num_cartas ; $i++){
               $jugador->afegirCarta($this->moverCartaAlFinal());
            }
         }

         //carta en mesa
         $this->carta_en_mesa = $this->moverCartaAlFinal();
      }

      public function jugar(){

         //mostrar mano de cada jugador
         foreach($this->array_jugadores as $jugador){
            
            if ($jugador->id == $this->turno) {
               echo '<div class="jugadorActivo">';
               echo $jugador->mostra_ma(); // Mostrar cartas del jugador actual
               echo '</div>';
            } else {
               echo '<div class="jugador">';
               echo $jugador->mostra_cartas_ocultas(); // Ocultar cartas de otros jugadores
               echo '</div>';
            }
            
         }

         //mostrar carta en mesa
         echo '<div class="carta_mesa">';
         echo $this->carta_en_mesa->pinta_carta();
         echo '</div>';

      }

      public function jugarCarta($palo, $num){
         $jugador_actual = $this->array_jugadores[$this->turno];
         $carta_jugada = null;

         foreach ($jugador_actual->mano as $key => $carta) {
            if ($carta->palo == $palo && $carta->num == $num) {
               $carta_jugada = $carta;
               unset($jugador_actual->mano[$key]);
               break;
            }
         }

         if ($carta_jugada) {
            $this->carta_en_mesa = $carta_jugada;
            $this->pasarTurno();
         }
      }

      public function pasarTurno(){
         if ($this->sentido == 'derecha') {
            $this->turno = ($this->turno + 1) % $this->num_jugadores;
         } else {
            $this->turno = ($this->turno - 1 + $this->num_jugadores) % $this->num_jugadores;
         }
      }

      //mover carta al final de la baraja
      public function moverCartaAlFinal(){
         $carta = array_shift($this->baraja);
         array_push($this->baraja, $carta);
         return $carta;
      }
   }
?>