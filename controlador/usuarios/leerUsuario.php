<?php
require_once '././modelo/conexion.php';
if(isset($_GET['id'])&& !empty(trim($_GET['id']))){
$query='SELECT * FROM usuarios WHERE id=?';
if($stmt=$conn-> prepare($query)){
    $stmt-> bind_param('i', $_GET['id']);
    if($stmt-> execute()){
        $result=$stmt -> get_result();
        if($result->num_rows==1){
            $row=$result-> fetch_array(MYSQLI_ASSOC);
            $nombre= $row['nombreUsuario'];
            $contrasenia= $row['contraseña'];
            $estado= $row['estado'];
          
        }else {
            echo 'Error, no existen resultados para esta consulta';
            exit();
        }

    }else{
        echo 'No se ejecutó la consulta';
        exit();
    }
    $stmt->close();
    $conn->close();
}else{
    echo 'Error, intente más tarde';
    exit();
}
}

?> 
