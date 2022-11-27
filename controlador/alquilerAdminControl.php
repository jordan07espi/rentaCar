<?php
require_once 'modelo/conexion.php';
//construyo la consulta
$query = "SELECT * FROM alquiler INNER JOIN auto ON auto.idauto=alquiler.idAlquiler INNER JOIN cliente ON auto.idauto=alquiler.idAlquiler;";
$result = $conn -> query($query);
?>