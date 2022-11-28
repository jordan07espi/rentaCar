<?php
require_once 'modelo/conexion.php';
//construyo la consulta
<<<<<<< HEAD
$query = "SELECT idAlquiler, fechaAlquiler, fechaDevolucion, Precio From alquiler";
=======
$query = "SELECT * FROM alquiler INNER JOIN auto ON auto.idauto=alquiler.idAlquiler INNER JOIN cliente ON auto.idauto=alquiler.idAlquiler;";
>>>>>>> cc2b658f2e82088fc2aa591cce84146b371be131
$result = $conn -> query($query);
?>