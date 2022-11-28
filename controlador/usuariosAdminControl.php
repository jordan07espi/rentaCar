<?php
require_once 'modelo/conexion.php';
//construyo la consulta
<<<<<<< HEAD
$query = "SELECT id, nombreUsuario, contraseña From usuarios";
=======
$query = "SELECT id, nombreUsuario, contraseña From usuarios WHERE estado=1 ";
>>>>>>> cc2b658f2e82088fc2aa591cce84146b371be131
$result = $conn -> query($query);
?>