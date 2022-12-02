<?php require_once '../../modelo/conexion.php';

//verificar si los datos fueron enviados por el método post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //verificar que existen datos en las variales enviadas
    $for_update = array_filter($_POST,function($k){
        return $k!=='Agregar';
        },ARRAY_FILTER_USE_KEY);
 

        //construir la consulta
        $query = "INSERT INTO auto(marca, placa, tipo, estado, estadoAlquiler ) VALUES (?,?,?,?,?)";

        //preparar la consulta
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param(
                'ssssi',
                $for_update['marca'],
                $for_update['placa'],
                $for_update['tipo'],
                $for_update['estado'],
                $for_update['estadoAlquiler']   
            );

            //Variables
            $marca=$_POST['marca'];
            $placa=$_POST['placa'];
            $tipo=$_POST['tipo'];
            $estado=$_POST['estado'];
            $estadoAlquiler=0;

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

?>