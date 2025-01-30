<?php
   class Partida{
      public int $num_jugadores;
      public int $num_cartas;
      public int $turno;
      public array $baraja;
      public object $carta_en_mesa;
      public array $array_jugadores;
      public string $sentido;
      public string $color_actual;

      public function __construct(int $num_jugadores, int $num_cartas, array $baraja){
         $this->num_jugadores = $num_jugadores;
         $this->num_cartas = $num_cartas;
         $this->array_jugadores = array();
         $this->baraja = $baraja;
         $this->turno = 0;
         $this->sentido = 'derecha';
         $this->color_actual = '';

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
               echo '<a href="?accion=robar" class="btn btn-primary robar">Robar carta</a>'; // Botón para robar carta
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

         //formulario para cambiar color
         if ($this->carta_en_mesa->num == 13) {
            echo '<form method="GET" action="index.php">';
            echo '<input type="hidden" name="accion" value="cambiar_color">';
            echo '<label for="color">Selecciona un color:</label>';
            echo '<select name="color" id="color">';
            echo '<option value="red">Rojo</option>';
            echo '<option value="yellow">Amarillo</option>';
            echo '<option value="blue">Azul</option>';
            echo '<option value="green">Verde</option>';
            echo '</select>';
            echo '<button type="submit" class="btn btn-primary">Cambiar color</button>';
            echo '</form>';
         }

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
            if ($carta_jugada->num != 13) {
               $this->pasarTurno();
            }
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

      //robar una carta
      public function robarCarta(){
         $jugador_actual = $this->array_jugadores[$this->turno];
         $jugador_actual->afegirCarta($this->moverCartaAlFinal());
         $this->pasarTurno();
      }

      public function cambiarColor($color){
         if ($this->carta_en_mesa->num == 13) {
            $this->carta_en_mesa->palo = $color;
            $this->pasarTurno();
         }
      }
   }
?>