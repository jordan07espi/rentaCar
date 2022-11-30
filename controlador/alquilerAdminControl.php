<?php
require_once 'modelo/conexion.php';
//construyo la consulta
$query = "SELECT * FROM alquiler INNER JOIN auto ON auto.idauto=alquiler.idAuto INNER JOIN cliente ON cliente.idCliente=alquiler.idCliente";
$result = $conn -> query($query);
?>