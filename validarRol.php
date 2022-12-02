<?php
require_once 'modelo/conexion.php';
//construyo la consulta
$query = "SELECT * From rolesusuarios INNER JOIN usuarios ON usuarios.id= rolesusuarios.idUsuario 
INNER JOIN roles ON roles.id= rolesusuarios.idRol ";
$result = $conn -> query($query);
?>