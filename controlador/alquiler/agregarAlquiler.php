<?php
require_once '../../modelo/conexion.php';







//verificar si los datos fueron enviados por el método post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //verificar que existen datos en las variales enviadas
    if (
        isset($_POST['cliente']) && isset($_POST['marca'])  && isset($_POST['fechaAlquiler'])  && isset($_POST['fechaDevolucion']) && isset($_POST['precio'])
       
    ) {
        
      
 
       $usuario=1;
        //construir la consulta
        $query = "INSERT INTO alquiler(idCliente, idAuto, idUsuario, fechaAlquiler, fechaDevolucion, Precio ) VALUES (?,?,?,?,?,?)";

        //preparar la consulta
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param(
                'iiissd',
                $_POST['cliente'],
                $_POST['marca'],
                $usuario,
                $_POST['fechaAlquiler'],
                $_POST['fechaDevolucion'],
                $_POST['precio']
              
        
            );

            //Ejecutar statement
            if ($stmt->execute()) {
                header('location: ../../alquilerAdmin.php');
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
