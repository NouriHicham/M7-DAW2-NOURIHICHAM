<?php

   $host = 'mysql-hichamnourichahid.alwaysdata.net';
   $username ='398203_uf3';
   $password = 'Maincraxd100*';
   $dbname = 'hichamnourichahid_uf3';

   $mysqli = new mysqli($host, $username, $password, $dbname);

   if($mysqli->connect_error){
      die('Error de conexion: '. $mysqli->connect_error);
   } else {
      //echo 'Conexion exitosa';
   }

   
?>