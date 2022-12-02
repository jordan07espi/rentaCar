<?php
require_once 'modelo/conexion.php';
//construyo la consulta
$query = "SELECT id, nombreUsuario, contraseña,estado From usuarios";



$result = $conn ->query($query);


?>