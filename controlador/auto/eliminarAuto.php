<?php
    
if(isset($_GET['id'])&& !empty(trim($_GET['id']))){
    require_once '../../modelo/conexion.php';
    $query='DELETE FROM auto WHERE idauto=?';
    if($stmt=$conn-> prepare($query)){
        $stmt-> bind_param('i',  $_GET['id']);
        
        if($stmt->execute()){
            header('location: ../../autoAdmin.php');
            exit(); 

        } else{
            echo  'Error!, no se ejecuto la consulta a la base de datos';
            exit();
        }
    }

    
    $conn->close();

}else{
    echo "Error!, Por favor intente mas tarde";
}


?>