<?php

if(isset($_GET['id'])&& !empty(trim($_GET['id']))){
    require_once '../conexion/conexion.php';
    $query='UPDATE usuarios SET estado=0 FROM usuario WHERE id=?';
    if($stmt=$conn-> prepare($query)){
        $stmt-> bind_param('i',  $_GET['id']);
        
        if($stmt->execute()){
            header('location: ../vista/index.php');
            exit(); 

        } else{
            echo  'Error!, no se ejecuto la consulta a la base de datos';
            exit();
        }
    }

    $stmt->close();
    $conn->close();

}else{
    echo "Error!, Por favor intente mas tarde";
}
?>
