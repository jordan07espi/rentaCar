<?php
require_once 'modelo/conexion.php';
//construyo la consulta
$query = "SELECT id, nombreUsuario, contraseña, fotoUsuario From usuarios WHERE estado=1 ";
$result = $conn -> query($query);
?>