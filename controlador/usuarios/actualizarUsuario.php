<?php
require_once '../../modelo/conexion.php';
//Leer los datos y visualizarlos en los cuadros de texto para su edicion

if(isset($_GET['id'])&& !empty(trim($_GET['id']))){
    $query='SELECT * FROM usuarios WHERE id=?';
    if($stmt=$conn-> prepare($query)){
        $stmt-> bind_param('i', $_GET['id']);
        if($stmt-> execute()){
            $result=$stmt -> get_result();
            if($result->num_rows==1){
                $row=$result-> fetch_array(MYSQLI_ASSOC);
                $nombre= $row['nombreUsuario'];
                $contraseña= $row['contraseña'];
               
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
   
    header('location: ../vista/index.php');
    exit();
}

//Tomar los datos editados y actualizarlos en la base  

//verificar si los datos fueron enviados por el método post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //verificar que existen datos en las variales enviadas
    if (
        isset($_POST['nombre']) && isset($_POST['contraseña']) 
    ) {
       
    

        $imagenBytes=addslashes(file_get_contents($_FILES['foto']['tmp_name']));
        //construir la consulta
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
                header('location: ../vista/index.php');
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
}

?>
