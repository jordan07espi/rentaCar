<?php
#llamada al archivo de conexión
require_once '../../modelo/conexion.php';

#control de id que llegue por el método GET
if(isset($_GET['id'])&& !empty(trim($_GET['id']))){
    
    $query='DELETE FROM alquiler  WHERE idAlquiler=?';
    if($stmt=$conn-> prepare($query)){
        $stmt-> bind_param('i',  $_GET['id']);
        
        if($stmt->execute()){
            header('location: ../../alquilerAdmin.php');
            exit(); 

        } else{
            echo  'Error!, no se ejecuto la consulta a la base de datos';
            exit();
        }
        $stmt->close();
    }

    
    $conn->close();

}else{
    echo "Error!, Por favor intente mas tarde";
}



