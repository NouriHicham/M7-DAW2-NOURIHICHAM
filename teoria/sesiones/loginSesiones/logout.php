<?php
session_start();
session_unset(); //eliminar solo variables
session_destroy(); //elimina la sesion entera

header('Location: login.php');
?>