<?php
//Manejar variales constantes

//Datos para la conexión a la base
define('SERVERNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORDNAME', '');
define('DBNAME', 'rentacar');

//Creación a la conexion a la base de datos mysqli 
$conn = new mysqli(SERVERNAME, USERNAME, PASSWORDNAME, DBNAME);

//controlar la conexión
if($conn -> connect_error){
    //funcion que si es que se cumple envia un mensaje
    die('Conexión fallida: '. $conn -> connect_error);   
}
?>