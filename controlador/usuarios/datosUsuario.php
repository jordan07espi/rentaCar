<?php
require_once '../../modelo/conexion.php';
//construyo la consulta
$query = "SELECT * FROM roles;";
$result = $conn -> query($query);

?>