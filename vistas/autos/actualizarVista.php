<?php
session_start();    
if (!isset($_SESSION['id'])) {
    header("location:../../indexLogin.html");
}
    require_once('../../controlador/auto/actualizarAuto.php');
?>
<!-- FORMULARIO -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/navbar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo auto</title>
</head>
<body>
    <h2>Actualizar un auto</h2>
    <p>Edite los datos del auto para actualizarlo en la base de datos</p>
    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
    <div>
        <label for="">Marca</label>
        <input type="text" name="marca" value="<?php echo $marca; ?>" required>
    </div>
    <div>
        <label for="">Placa</label>
        <input type="text" name="placa" value="<?php echo $placa; ?>" required>
    </div>
    <div>
        <label for="">Tipo</label>
        <input type="text" name="tipo" value="<?php echo $tipo; ?>" required>
    </div>
    <div>
        <label for="">Estado</label>
        <input type="text" name="estado" value="<?php echo $estado; ?>" required>
    </div>
    <div>
        <label for="">Estado alquiler</label>
        <select name="estadoAlquiler">
            <?php echo $estadosAlquiler[$estadoAlquiler] ?>
        </select>
    </div>
    <input type="submit" value="Actualizar">
    <a href="../../autoAdmin.php">Cancelar</a>  
    </form>
</body>
</html>