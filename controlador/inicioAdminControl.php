<?php
require_once 'modelo/conexion.php';
//construyo la consulta
$query = "SELECT idCliente, nombresCli, cedula,	direccion,	telefono From cliente";
$result = $conn -> query($query);
?>