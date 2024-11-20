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
   $_SESSION['libros'][$id] = [
      "titulo" => $titulo,
      "autor" => $autor,
      "descripcion" => $descripcion,
      "imagen" => $imagen
  ];

}

function eliminarLibro($id){
   array_splice($_SESSION['libros'], $id, 1);
}

?>