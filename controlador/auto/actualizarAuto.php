<?php 

/* $estadosAlquiler = [0=>'select name="estadoAlquiler">
                            <option selected value="1">Activo</option>
                            <option value="0">Inactivo</option>
                            </select>',
                    1=>'select name="estadoAlquiler">
                            <option selected value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>']; */

require_once '../../modelo/conexion.php';

if(isset($_GET['id']) && !empty(trim($_GET['id']))){
    $id = $_GET['id'];
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
               
            }
        }else {
            echo'NO se ejecuto la consulta';
          
        }
    }
    $stmt ->close();
   
}else {
    echo'Error, intente más tarde';
    
}



//Verificar si los canpos son enviados
$path_location ='';
if($_SERVER['REQUEST_METHOD']=='POST'){
    //Revisar imagen
    $revisar = getimagesize($_FILES["fotoAuto"]["tmp_name"]);
    if($revisar !== false){
        $image = $_FILES['fotoAuto']['tmp_name'];
        $fotografia = addslashes(file_get_contents($image));
          

        //Verificar si los datos de las variables estan enviadas
        if(isset($_POST['marca']) && isset($_POST['placa']) && isset($_POST['tipo']) && isset($_POST['estado']) && 
            isset($_POST['estadoAlquiler'])){

            //Variables
            $marca=$_POST['marca'];//s
            $placa=$_POST['placa'];//s
            $tipo=$_POST['tipo'];//s
            $estado=$_POST['estado'];//s
            $estadoAlquiler=$_POST['estadoAlquiler'];//i
            
            //Contruir la consulta
            $query_update = "UPDATE auto SET marca='$marca',placa='$placa',tipo='$tipo',estado='$estado',estadoAlquiler='$estadoAlquiler',
            fotoAuto= '$fotografia' WHERE idauto='$id'";

             $conn->query($query_update); 
            //Redireccionar
           header("location: ../../autoAdmin.php"); 
               
           
        }else{
            echo "No se estan llenando todos los datos";
        }
        $conn -> close();
    }else{
    //echo "no llenaron los datos por el metodo POST"; */
    }
}

?>