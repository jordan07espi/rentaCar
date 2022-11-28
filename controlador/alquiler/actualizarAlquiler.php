<?php
require_once '../../modelo/conexion.php';
//Leer los datos y visualizarlos en los cuadros de texto para su edicion

if(isset($_GET['id'])&& !empty(trim($_GET['id']))){
    $query='SELECT * FROM alquiler INNER JOIN auto ON auto.idauto=alquiler.idAuto 
                    INNER JOIN cliente ON cliente.idCliente=alquiler.idCliente
                    WHERE alquiler.idAlquiler=?';
    if($stmt=$conn-> prepare($query)){
        $stmt-> bind_param('i', $_GET['id']);
        if($stmt-> execute()){
            $result=$stmt -> get_result();
            if($result->num_rows==1){
                $row=$result-> fetch_array(MYSQLI_ASSOC);

               /*  echo '<td>' . $row['idAlquiler'] . '</td>';
                echo '<td>' . $row['nombresCli'] .'</td>';
                echo '<td>' . $row['marca'] .'</td>';
                echo '<td>' . $row['fechaAlquiler'] .'</td>';
                echo '<td>' . $row['fechaDevolucion'] . '</td>';
                echo '<td>' . $row['Precio'] . '</td>'; */

                $nombreCli       = $row['nombresCli'];
                $marcaAuto       = $row['marca'];
                $fechaAlquiler   = $row['fechaAlquiler'];
                $fechaDevolucion = $row['fechaDevolucion'];
                $precioAlquiler  = $row['Precio'];
                
               
            }else {
                echo 'Error, no existen resultados para esta consulta';
                exit();
            }

        }else{
            echo 'No se ejecutó la consulta';
            exit();
        }
        $stmt->close();
      
    }else{
        echo 'Error, intente más tarde';
        exit();
    }
}else{
   
    header('location:  ../../alquilerAdmin.php');
    exit();
}

//Tomar los datos editados y actualizarlos en la base  
$path_location ='';
if($_SERVER['REQUEST_METHOD']=='POST'){
$for_update = array_filter($_POST,function($k){
            return $k!=='cliente-name' && $k!=='submit' && $k!=='marca-name';
            },ARRAY_FILTER_USE_KEY);

$query_update = "UPDATE alquiler SET fechaAlquiler=?,fechaDevolucion=?,Precio=?
                WHERE idAlquiler=?";

$array_id = ["id"=>$_GET['id']];

$to_update = array_values(array_merge($for_update,$array_id));

$path_location = "../../vistas/alquiler/actualizarVista.php";

$stmt = $conn->prepare($query_update);


    if($stmt){
    $stmt->bind_param('ssdi',...$to_update);

    }

    if ($stmt->execute()) {
        $path_location = "../../alquilerAdmin.php";
        exit();
    }
} else {
    /* echo "Error! El statement no se ejecutó"; */
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
