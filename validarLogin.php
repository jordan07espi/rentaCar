<?php
session_start();
$user=$_POST ['usuario'];
$pass=$_POST['contraseña'];

if(isset($user)){
    //proceso de conexion a la base de datos
    
    //varable de conexion
    $servername= "localhost:3308";
    $username= "root";
    $password= "";
    $dbname= "rentacar";
    
    //crear una conexion a la base de datos
    $con = mysqli_connect($servername, $username, $password, $dbname) or die ("Error en la conexión");
    //consultar si los datos son los que estan en la base
    $consulta= "SELECT*FROM usuarios WHERE nombreUsuario='$user' AND contraseña = '$pass' AND estado=1";
    //ejecutar la consulta
    $resultados= mysqli_query($con, $consulta) or die (mysqli_connect_errno ());
    //alamacenar los datos en un arreglo
    $fila = mysqli_fetch_array($resultados);
    //controlar si llegan datos desde la consulta
    if($fila['id']==null){
        //redirigir al login
        header("location:indexLogin.html");
    }else{
        //crear la sesion
        SESSION_START();
        //definir las variables de sesion y redirigimos a una pagina de usuario
        $_SESSION['id']= $fila['id'];
        $_SESSION['nombre']= $fila['nombreUsuario'];
        header("location:inicioAdmin.php");
    }

}else{
    header("location:indexLogin.html");
}
?>

