<?php
    //Verificar si los canpos son enviados
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Revisar imagen
        $revisar = getimagesize($_FILES["foto"]["tmp_name"]);
        if($revisar !== false){
            $image = $_FILES['foto']['tmp_name'];
            $fotografia = addslashes(file_get_contents($image));

            //Conexion a la base de datos
            incluide_once ("../../modelo/conexion.php");            

            //Verificar si los datos de las variables estan enviadas
            if(isset($_POST['nombre']) && isset($_POST['contraseña'])){

                //Variables
                $nombre=$_POST['nombre'];
                $contraseña=$_POST['contraseña'];

                //Contruir la consulta
                $consulta = $conn->query("INSERT INTO usuario(nombreUsuario, contraseña, fotoUsuario) 
                VALUES ('$nombre', '$contraseña', '$fotografia')");

                //Redireccionar
                header("location: ../../usuariosAdmin.php");

            }else{
                echo "No se estan llenando todos los datos";
            }
            $conn -> close();
        }else{
            //echo "no llenaron los datos por el metodo POST";
        }
    }

?>