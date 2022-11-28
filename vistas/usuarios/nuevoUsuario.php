<?php
require_once '../../controlador/usuarios/agregarUsuario.php';
?>
<!-- FORMULARIO -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/navbar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo usuario</title>
</head>
<body>
    <h2>Agregar un nuevo Usuario</h2>
    <p>Llene el formulario para agregar un usuario a la base de datos</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div>
        <label for="">Nombre</label>
        <input type="text" name="nombre" required>
    </div>
    <div>
        <label for="">Contraseña</label>
        <input type="text" name="contraseña" required>
    </div>
    <div>
        <input type="file" name="foto" required>
    </div>
   
    <input type="submit" value="Agregar">
    <a href="../../usuariosAdmin.php">Cancelar</a>  
    </form>
</body>
</html>