<?php
session_start();
if(isset($_GET['id'])&& !empty(trim($_GET['id']))){
    require_once '../../modelo/conexion.php';
    $query='DELETE FROM cliente WHERE idCliente=?';
    if($stmt=$conn-> prepare($query)){
        $stmt-> bind_param('i',  $_GET['id']);
    try
       { if($stmt->execute()){
            header('location: ../../inicioAdmin.php');
            exit(); 

        } else{
            echo  'Error!, no se ejecuto la consulta a la base de datos';
            exit();
        } 
        $stmt->close();
      }catch(Exception $e){
        $_SESSION['msg'] = "Error. El cliente posee un auto alquilado!!!";
        header('location: ../../inicioAdmin.php');
      }

    }

   
    $conn->close();

}else{
    echo "Error!, Por favor intente mas tarde";
}
?>
