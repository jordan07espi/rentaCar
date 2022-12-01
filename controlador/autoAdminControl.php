<?php
require_once 'modelo/conexion.php';
//construyo la consulta
$query = "SELECT idauto, marca, placa, tipo, estado, estadoAlquiler,fotoAuto From auto";
$result = $conn -> query($query);
?>