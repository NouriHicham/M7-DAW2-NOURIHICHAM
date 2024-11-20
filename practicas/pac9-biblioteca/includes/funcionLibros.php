<?php
session_start();
include_once 'includes/libreria.php';

function agregarLibro($titulo, $autor, $imagen, $descripcion){
   $nuevo_libro = [
      "titulo" => $titulo, 
      "autor" => $autor, 
      "descripcion" => $descripcion,
      "imagen" => $imagen
   ];
   array_push($_SESSION['libros'], $nuevo_libro);
}

function editarLibro($id, $titulo, $autor, $imagen, $descripcion){
   $edit_libro = [
      "titulo" => $titulo, 
      "autor" => $autor, 
      "descripcion" => $descripcion,
      "imagen" => $imagen
   ];

   array_replace($_SESSION['libros'], array($id => $edit_libro));

}

?>