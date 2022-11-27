<?php
require_once 'modelo/conexion.php';
//construyo la consulta
$query = "SELECT idAlquiler, fechaAlquiler, fechaDevolucion, Precio From alquiler";
$result = $conn -> query($query);
?>