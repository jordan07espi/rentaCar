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
}else {
    echo'Error, intente más tarde';
    exit();
}
//Verificar si los canpos son enviados
$path_location ='';
if($_SERVER['REQUEST_METHOD']=='POST'){
$for_update = array_filter($_POST,function($k){
            return $k!=='cliente-name' && $k!=='submit' && $k!=='marca-name';
            },ARRAY_FILTER_USE_KEY);


    //Revisar imagen
    $revisar = getimagesize($_FILES["fotoAuto"]["tmp_name"]);
    if($revisar !== false){
        $image = $_FILES['fotoAuto']['tmp_name'];
        $fotografia = addslashes(file_get_contents($image));

        //Conexion a la base de datos
        include_once('../../modelo/conexion.php');             

        //Verificar si los datos de las variables estan enviadas
        if(isset($_POST['marca']) && isset($_POST['placa']) && isset($_POST['tipo']) && isset($_POST['estado']) && 
            isset($_POST['estadoAlquiler'])){

            //Variables
            $marca=$_POST['marca'];
            $placa=$_POST['placa'];
            $tipo=$_POST['tipo'];
            $estado=$_POST['estado'];
            $estadoAlquiler=$_POST['estadoAlquiler'];

            //Contruir la consulta
            $query_update = "UPDATE auto SET marca=?,placa=?,tipo=?,estado=?,estadoAlquiler=?,fotoAuto=$fotografia
                WHERE idauto=?";

            //Redireccionar
            header("location: ../../autoAdmin.php");

        }else{
            echo "No se estan llenando todos los datos";
        }
        $conn -> close();
    }else{
        //echo "no llenaron los datos por el metodo POST";
    }
}

?>