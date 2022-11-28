<?php
    require_once("./modelo/conexion.php");

    #se recogen los datos que llegan desde el formulario
    $user_for_login = array_filter($_POST,function($current){
        #se controla que sea diferente de Login
        return $current!=='Login';
    },ARRAY_FILTER_USE_BOTH);

    #se extraen en variables los datos del usuario que llegan del formulario de inicio de sesión
    extract($user_for_login);

    #consulta de id de usuario, nombre de usuario, idrol de rolesusuarios,id de rol y nombreRol de roles.
    $sql = "SELECT u.id,u.nombreUsuario,ru.idRol idrol,r.id,r.nombreRol FROM usuarios u 
    INNER JOIN rolesusuarios ru ON (u.id = ru.idusuario) INNER JOIN roles r ON (idrol=r.id)
    WHERE u.nombreUsuario = '$usuario' AND u.contraseña ='$contraseña';";

    #se ejecuta la consulta
    $resultado = $conn->query($sql);
    #se extraen los datos de la consulta
    $row = $resultado->fetch_assoc();
    #se define el redireccionamiento según el nombre de rol
    $path_page = ["administrador"=>"inicioAdmin.php","empleado"=>"inicioEmpleado.php"];

    #se controla si la consulta devuelve algún resultado
    if($resultado->num_rows>0 ){
        #se redirecciona a la página correspondiente
        header("Location:".$path_page[$row['nombreRol']]);
    }
    else {
        echo "<p>Error a iniciar sesións</p>";
        header("location:indexLogin.html");
    }



   /*    */






?>

