<?php
    require_once('../../controlador/auto/agregarAuto.php');
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
        <label for="">Marca</label>
        <input type="text" name="marca" required>
    </div>
    <div>
        <label for="">Placa</label>
        <input type="text" name="placa" required>
    </div>
    <div>
        <label for="">Tipo</label>
        <input type="text" name="tipo" required>
    </div>
    <div>
        <label for="">Estado</label>
        <input type="text" name="estado" required>
    </div>
    <div>
        <label for="">Estado alquiler</label>
        <select name="estadoAlquiler">
            <option selected value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
    </div>
    <input type="submit" value="Agregar">
    <a href="../../autoAdmin.php">Cancelar</a>  
    </form>
</body>
</html>