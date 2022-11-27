<?php
require_once './modelo/conexion.php';
//verificar los datos feron enviados por el metodo post
if($_SERVER['REQUEST_METHOD']=='POST'){
    //verificar que exista atos en las variables enviadas
    if(isset($_POST['nombre']) && isset($_POST['cedula']) && isset($_POST['direccion']) && isset($_POST['telefono'])){
        //construir la consulta
        $query = "INSERT INTO cliente(nombresCli, cedula, direccion, telefono) VALUES (?,?,?,?)";
        //prepar la consulta para ejecutarla
        if($stmt = $conn -> prepare($query)){
            $stmt -> bind_param('ssss', $_POST['nombre'], $_POST['cedula'], $_POST['direccion'], $_POST['telefono']);
            //ejecutar startment
            if($stmt ->execute()){
                header("location: inicioAdmin.php");
                exit();
            }else{
                echo "Error! El statement no se ejecuto";
            }
            $stmt -> close();
        }else{
            
            echo "Error! En la preparacion del statement";
        }
    }else{
        
        echo "No se esta llenando datos";
    }
    $conn -> close();
}else{
/*     echo "No llegaron los datos por el metod post"; */
}
?>