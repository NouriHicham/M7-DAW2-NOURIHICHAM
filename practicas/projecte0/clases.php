<?php

class Libro
{
   public string $titol;
   public string $autor;
   public int $anyPublic;
   public string $foto;

   public function __construct($titol, $autor, $anyPublic, $foto)
   {
      $this->titol = $titol;
      $this->autor = $autor;
      $this->anyPublic = $anyPublic;
      $this->foto = $foto;
   }

   public function detalls()
   {
      return '
         <div class="card me-3" style="width: 18rem;">
            <img src="'.$this->foto.'" class="card-img-top">
            <div class="card-body">
               <h5 class="card-title">'.$this->titol.'</h5>
               <p class="card-text">'.$this->autor.' - '.$this->anyPublic.'</p>
            </div>
         </div>
      ';
   }
}

class Biblioteca
{
   private array $biblioteca = [];

   public function afegirLlibre($titol, $autor, $anyPublic, $foto){
      $libro = new Libro($titol, $autor, $anyPublic, $foto);
      array_push($this->biblioteca, $libro);
   }

   public function mostrarLlibres(){
      foreach ($this->biblioteca as $libro) {
         echo $libro->detalls();
      }
   }

   public function buscarLlibre(string $busqueda){
      foreach ($this->biblioteca as $libro) {
         //preguntar profe el !==false
         if(strpos(strtolower($libro->titol), strtolower($busqueda)) !== false){
            return '
                     <div class="card me-3" style="width: 18rem;">
                        <img src="'.$libro->foto.'" class="card-img-top">
                        <div class="card-body">
                           <h5 class="card-title">'.$libro->titol.'</h5>
                           <p class="card-text">'.$libro->autor.' - '.$libro->anyPublic.'</p>  
                        </div>
                     </div>
                   ';
         }
      }
   }
}