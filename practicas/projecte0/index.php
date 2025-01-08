<?php
session_start();

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
      return 'El llibre ' . $this->titol . ' de ' . $this->autor . ' publicat el ' . $this->anyPublic . '';
   }
}

class Biblioteca
{
   public array $biblioteca = [];

   //funcio que al afegir un llibre al array li afegira un numero endevant segons el numero de elements
   public function afegirLlibre($titol, $autor, $anyPublic, $foto){
      $libro = new Libro($titol, $autor, $anyPublic, $foto);
      array_push($this->biblioteca, $libro);
   }

   public function mostrarLlibres(){
      foreach ($this->biblioteca as $libro) {
         
         echo $libro->detalls();
      }
   }
}

$prueba = new Biblioteca;
$prueba->afegirLlibre('Cien años de soledad', 'Gabriel García Márquez', 1967, 'https://m.media-amazon.com/images/I/91TvVQS7loL._AC_UF894,1000_QL80_.jpg');
$prueba->afegirLlibre('aaa', 'bbb', 1923, 'ccc');

echo $prueba->mostrarLlibres();
