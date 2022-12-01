<<<<<<< HEAD
<?php
require_once '../../modelo/conexion.php';
//Leer los datos y visualizarlos en los cuadros de texto para su edicion
$estadosAlquiler = [0=>"<option value='1'>Activo</option>
                        <option selected value='0'>Inactivo</option>",
                    1=>"<option selected value='1'>Activo</option>
                        <option value='0'>Inactivo</option>"];



if(isset($_GET['id'])&& !empty(trim($_GET['id']))){
    $query='SELECT*FROM auto WHERE idauto=?';
    if($stmt=$conn-> prepare($query)){
        $stmt-> bind_param('i', $_GET['id']);
        if($stmt-> execute()){
            $result=$stmt -> get_result();
            if($result->num_rows==1){
                $row=$result-> fetch_array(MYSQLI_ASSOC);

            
                $marca           = $row['marca'];
                $placa           = $row['placa'];
                $tipo            = $row['tipo'];
                $estado          = $row['estado'];
                $estadoAlquiler  = $row['estadoAlquiler'];
                
               
            }else {
                echo 'Error, no existen resultados para esta consulta';
               
            }

        }else{
            echo 'No se ejecutó la consulta';
          
        }
        $stmt->close();
      
    }else{
        echo 'Error, intente más tarde';

    }
}else{
   
    header('location:  ../../autoAdmin.php');
 
}

//Tomar los datos editados y actualizarlos en la base  
$path_location ='';
if($_SERVER['REQUEST_METHOD']=='POST'){
$for_update = array_filter($_POST,function($k){
            return $k!=='Actualizar';
            },ARRAY_FILTER_USE_KEY);

$query_update = "UPDATE auto SET marca=?,placa=?,tipo=?,estado=?,estadoAlquiler=?
                WHERE idauto=?";

$array_id = ["id"=>$_GET['id']];

$to_update = array_values(array_merge($for_update,$array_id));

$path_location = "../../vistas/autos/actualizarVista.php";

$stmt = $conn->prepare($query_update);


    if($stmt){
    $stmt->bind_param('ssssii',...$to_update);

    }
    
    if ($stmt->execute()) {
        $path_location = "../../autoAdmin.php";
       
    }
} else {
    #echo "Error! El statement no se ejecutó";
}

header("Location:".$path_location);
//verificar si los datos fueron enviados por el método post
/* if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //verificar que existen datos en las variales enviadas
    if (
        isset($_POST['nombre']) && isset($_POST['contraseña']) 
    ) {
       
    
        $query = "UPDATE usuarios set nombreUsuario=?, contraseña=? WHERE id=?";

        //preparar la consulta
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param(
                'ssi',
                $_POST['nombre'],
                $_POST['contraseña'],
                $_GET['id']
            );

            //Ejecutar statement
            if ($stmt->execute()) {
                header('location:  ../../usuariosAdmin.php');
                exit();
            } else {
                echo "Error! El statement no se ejecutó";
            }
            $stmt->close();
        } else {
            echo "Error en la preparación del statement";
        }
    } else {
        echo "No se están llenando todos los datos";
    }
} */

?>
=======
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
>>>>>>> Steven
