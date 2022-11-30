<?php
session_start();
require_once '../../controlador/clientes/agregarCliente.php';
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
    <h2>Agregar un nuevo Cliente</h2>
    <p>Llene el formulario para agregar un cliente a la base de datos</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div>
        <label for="">Nombre</label>
        <input type="text" name="nombre" required>
    </div>
    <div>
        <label for="">Cedula</label>
        <input type="text" name="cedula" required>
    </div>
    <div>
        <label for="">Direccion</label>
        <input type="text" name="direccion" required>
    </div>
    <div>
        <label for="">Telefono</label>
        <input type="text" name="telefono" required>
    </div>
    <input type="submit" value="Agregar">
    <a href="../../inicioAdmin.php">Cancelar</a>  
    </form>
</body>
</html>