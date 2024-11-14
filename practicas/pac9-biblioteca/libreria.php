<?php
session_start();
$_SESSION['libros'] = [
   ["titulo" => "Cien años de soledad", "autor" => "Gabriel García Márquez", "descripcion" => "Una de las obras más representativas del realismo mágico, que narra la historia de la familia Buendía en el ficticio pueblo de Macondo.", "imagen" => "https://example.com/cien-anos-de-soledad.jpg"],
   ["titulo" => "1984", "autor" => "George Orwell", "descripcion" => "Una distopía política que describe un mundo totalitario donde el gobierno controla todos los aspectos de la vida humana.", "imagen" => "https://example.com/1984.jpg"],
   ["titulo" => "El gran Gatsby", "autor" => "F. Scott Fitzgerald", "descripcion" => "Una novela que explora la decadencia y el exceso de la sociedad estadounidense en los años 20, centrada en la vida de Jay Gatsby.", "imagen" => "https://example.com/el-gran-gatsby.jpg"],
   ["titulo" => "Don Quijote de la Mancha", "autor" => "Miguel de Cervantes", "descripcion" => "La famosa obra de la literatura española que narra las aventuras del caballero Don Quijote y su fiel escudero Sancho Panza.", "imagen" => "https://example.com/don-quijote.jpg"],
   ["titulo" => "La sombra del viento", "autor" => "Carlos Ruiz Zafón", "descripcion" => "Una novela de misterio y suspenso que se desarrolla en la Barcelona de la posguerra, donde un joven descubre un libro perdido que cambia su vida.", "imagen" => "https://example.com/la-sombra-del-viento.jpg"]
];
?>