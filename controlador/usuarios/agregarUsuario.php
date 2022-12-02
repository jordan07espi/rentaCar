<?php
    //Verificar si los canpos son enviados
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Revisar imagen
   
       

            //Conexion a la base de datos
            include_once ("../../modelo/conexion.php");            

            //Verificar si los datos de las variables estan enviadas
            if(isset($_POST['nombre']) && isset($_POST['contraseña'])&& isset($_POST['rol'])){

                //Variables
                $nombre=$_POST['nombre'];
                $contraseña=$_POST['contraseña'];

                $rol=$_POST['rol'];

                //Contruir la consulta
                $consulta = $conn->query("INSERT INTO usuarios(nombreUsuario, contraseña, estado) 
                VALUES ('$nombre', '$contraseña',1)");

                //id del usuario
                $consultaUsuario = "SELECT * FROM usuarios WHERE nombreUsuario= '$nombre' AND contraseña='$contraseña';";
                $resultUsuario = $conn -> query($consultaUsuario);
                
                //fechaactual
                date_default_timezone_set('America/Bogota');
                $date = date('Y-m-d', time());
                $date;
                
                if ($resultUsuario->num_rows== 1) {
                    while ($rowUsuario = $resultUsuario->fetch_assoc()) {

                        $idusuario= $rowUsuario['id'];
                        $consultaRolesUsuarios = $conn->query("INSERT INTO rolesusuarios(idRol, idUsuario, fechacreacion) 
                        VALUES ( '$rol', '$idusuario','$date')");
                    }
                    $result->free();
                } else {
                    echo '<p><em> No existen datos registrados</em></p>';
                }


             

                

                //Redireccionar
                header("location: ../../usuariosAdmin.php");

            }else{
                echo "No se estan llenando todos los datos";
            }
            $conn -> close();
       
    }

?>