<?php 
//Verificar si los canpos son enviados
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $for_update = array_filter($_POST,function($k){
        return $k!=='Agregar';
        },ARRAY_FILTER_USE_KEY);

    //Revisar imagen
    $revisar = getimagesize($_FILES["fotoAuto"]["tmp_name"]);
    if($revisar !== false){
        $image = $_FILES['fotoAuto']['tmp_name'];
        $fotografia = addslashes(file_get_contents($image));

        //Conexion a la base de datos
        include_once('../../modelo/conexion.php');             

        //Verificar si los datos de las variables estan enviadas
        if(isset($_POST['marca']) && isset($_POST['placa']) && isset($_POST['tipo']) && isset($_POST['estado']) && 
            isset($_POST['estadoAlquiler'])){

            //Variables
            $marca=$_POST['marca'];
            $placa=$_POST['placa'];
            $tipo=$_POST['tipo'];
            $estado=$_POST['estado'];
            $estadoAlquiler=$_POST['estadoAlquiler'];

            //Contruir la consulta
            $consulta = $conn->query("INSERT INTO auto(marca, placa, tipo, estado, estadoAlquiler, fotoAuto) 
            VALUES ('$marca', '$placa', '$tipo', '$estado', '$estadoAlquiler', '$fotografia')");

            //Redireccionar
            header("location: ../../autoAdmin.php");

        }else{
            echo "No se estan llenando todos los datos";
        }
        $conn -> close();
    }else{
        //echo "no llenaron los datos por el metodo POST";
    }
}

?>