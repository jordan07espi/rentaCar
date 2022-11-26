<?php
require_once '../../modelo/conexion.php';

//verificar si los datos fueron enviados por el método post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //verificar que existen datos en las variales enviadas
    if (
        isset($_POST['nombre']) && isset($_POST['contraseña'])
       
    ) {
        
      
 
      
        //construir la consulta
        $query = "INSERT INTO usuarios(nombreusuario, contraseña, estado) VALUES (?,?,?)";

        //preparar la consulta
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param(
                'ssi',
                $_POST['nombre'],
                $_POST['contraseña'],
               1
               

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
}/*else{
    echo "No llegaron los datos del método POST";
}*/

?>
