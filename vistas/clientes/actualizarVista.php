<?php
session_start();    
if (!isset($_SESSION['id'])){
	header("location:validarLogin.php");
}
   require_once '../../controlador/clientes/actualizarCliente.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="../estilos/estilo.css">

</head>
<body>
    <div id="contenedor">

   
    <h1>Actualizar datos del cliente</h1>
    <p>Edite los datos del usuario para actualizarlo en la base de datos</p>
    <form class=" col-sm-3 " action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data"
    >
    <div class="mb-1">
        <label for="exampleFormControlInput1" class="form-label">Nombres</label>
        <input  class="form-control" type="text" name="nombre" value="<?php  echo $nombre ?>" required>
    </div>
    <div class="mb-1">
        <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
        <input  class="form-control" type="text" name="cedula" value="<?php echo $cedula ?>" required>

    </div>
    <div class="mb-1">
        <label for="exampleFormControlInput1" class="form-label">Direccion</label>
        <input  class="form-control" type="text" name="direccion" value="<?php echo $direccion ?>" required>

    </div>
    <div class="mb-1">
        <label for="exampleFormControlInput1" class="form-label">Teléfono</label>
        <input  class="form-control" type="text" name="telefono" value="<?php echo $telefono ?>" required>

    </div>
 
    
    <input class="btn btn-primary text-white mb-2" type="submit" value="Actualizar">
    
   <a  class="btn btn-primary text-white mb-2" href="../../inicioAdmin.php">Atrás</a>
   </form>
   </div>
 
    
</body>
</html>