<?php
session_start();
if(!isset($_SESSION['libros'])){
   $_SESSION['libros'] = [
      ["titulo" => "Cien años de soledad", "autor" => "Gabriel García Márquez", "descripcion" => "Una de las obras más representativas del realismo mágico, que narra la historia de la familia Buendía en el ficticio pueblo de Macondo.", "imagen" => "https://m.media-amazon.com/images/I/91TvVQS7loL.jpg"],
      ["titulo" => "1984", "autor" => "George Orwell", "descripcion" => "Una distopía política que describe un mundo totalitario donde el gobierno controla todos los aspectos de la vida humana.", "imagen" => "https://m.media-amazon.com/images/I/71sOSrd+JxL._AC_UF894,1000_QL80_.jpg"],
      ["titulo" => "El gran Gatsby", "autor" => "F. Scott Fitzgerald", "descripcion" => "Una novela que explora la decadencia y el exceso de la sociedad estadounidense en los años 20, centrada en la vida de Jay Gatsby.", "imagen" => "https://www.anagrama-ed.es/uploads/media/portadas/0001/15/b2834bc4ea71357c8b549dfccdd16d611c6586ea.jpeg"],
      ["titulo" => "Don Quijote de la Mancha", "autor" => "Miguel de Cervantes", "descripcion" => "La famosa obra de la literatura española que narra las aventuras del caballero Don Quijote y su fiel escudero Sancho Panza.", "imagen" => "https://proassetspdlcom.cdnstatics2.com/usuaris/libros/fotos/374/original/portada_don-quijote-de-la-mancha-comic_miguel-de-cervantes_202310231106.jpg"],
      ["titulo" => "La sombra del viento", "autor" => "Carlos Ruiz Zafón", "descripcion" => "Una novela de misterio y suspenso que se desarrolla en la Barcelona de la posguerra, donde un joven descubre un libro perdido que cambia su vida.", "imagen" => "https://m.media-amazon.com/images/I/71BS32NFrsL._AC_UF1000,1000_QL80_.jpg"]
   ];
}
?>