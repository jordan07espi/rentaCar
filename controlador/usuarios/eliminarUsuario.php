<?php
$op_ac_de = ["active"=>1,"deactive"=>0];
if(isset($_GET['id']) && !empty(trim($_GET['id'])) && isset($_GET['op']) && !empty(trim($_GET['op']))){
    require_once '../../modelo/conexion.php';
    $id = $_GET['id'];
    $opcion_get = $_GET['op'];
    $opcion_exe = $op_ac_de[$opcion_get];
    $query="UPDATE usuarios SET estado='$opcion_exe'  WHERE id='$id'";
    if($conn->query($query)){
        header("location:../../usuariosAdmin.php");
    }
       
    echo "Error al actualizar estado del usuario";
    
   
    
    exit();
    $conn->close();

}else{
    echo "Error!, Por favor intente mas tarde";
}
?>
