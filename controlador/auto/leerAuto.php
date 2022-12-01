<?php
require_once '../../modelo/conexion.php';
if(isset($_GET['id']) && !empty(trim($_GET['id']))){
    $query = 'SELECT * FROM auto WHERE idauto=?';
    if($stmt = $conn->prepare($query)){
        $stmt-> bind_param('i', $_GET['id']);
        if($stmt ->execute()){
            $result = $stmt ->get_result();
            if($result ->num_rows == 1){
                $row = $result ->fetch_array(MYSQLI_ASSOC);
                $marca = $row['marca'];
                $placa = $row['placa'];
                $tipo = $row['tipo'];
                $estado = $row['estado'];
                $estadoAlquiler = $row['estadoAlquiler'];
                $foto = $row['fotoAuto'];
            }else {
                echo'Error no existe resultado paresta consulta';
                exit();
            }
        }else {
            echo'NO se ejecuto la consulta';
            exit();
        }
    }
    $stmt ->close();
    $conn ->close();
}else {
    echo'Error, intente más tarde';
    exit();
}
?>