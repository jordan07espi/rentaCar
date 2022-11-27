<?php
   require_once '../../controlador/usuarios/actualizarUsuario.php';
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

   
    <h1>Actualizar un usuario</h1>
    <p>Edite los datos del usuario para actualizarlo en la base de datos</p>
    <form class=" col-sm-3 " action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data"
    >
    <div class="mb-1">
        <label for="exampleFormControlInput1" class="form-label">Usuario</label>
        <input  class="form-control" type="text" name="nombre" value="<?php  echo $nombre ?>" required>
    </div>
    <div class="mb-1">
        <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
        <input  class="form-control" type="text" name="contraseña" value="<?php echo $contrasenia ?>" required>

    </div>
 
    
    <input class="btn btn-primary text-white mb-2" type="submit" value="Actualizar">
    
   <a  class="btn btn-primary text-white mb-2" href="../../usuariosAdmin.php">Atrás</a>
   </form>
   </div>
 
    
</body>
</html>