<?php
require_once '../../modelo/conexion.php';
//construyo la consulta
$query = "SELECT * FROM cliente;";
$result = $conn -> query($query);

$query2 = "SELECT * FROM auto WHERE estadoAlquiler=0;";
$result2 = $conn -> query($query2);
?>