<?php
    session_start();
if(isset($_GET['id'])&& !empty(trim($_GET['id']))){
    require_once '../../modelo/conexion.php';
    $query='DELETE FROM auto WHERE idauto=?';
    if($stmt=$conn-> prepare($query)){
        $stmt-> bind_param('i',  $_GET['id']);
        
       try{ if($stmt->execute()){
            header('location: ../../autoAdmin.php');
            exit(); 

            }
        }catch(Exception $e){
            $_SESSION['msg-error-delete-auto'] = "Error. El auto ha sido alquilado!!!";
            header('location: ../../autoAdmin.php');
        }
    
    }

    
    $conn->close();

}else{
    echo "Error!, Por favor intente mas tarde";
}


?>