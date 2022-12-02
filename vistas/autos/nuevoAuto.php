<?php
require_once('../../controlador/auto/agregarAuto.php');
session_start();
if (!isset($_SESSION['id'])) {
    header("location:../../indexLogin.html");
}
?>
<!-- FORMULARIO -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/navbar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/formularios.css" />
    <link rel="stylesheet" href="../../css/navbar.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <title>Nuevo cliente</title>
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark" id="navbar">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarScroll">
                <img src="../../img/collab.png" alt="" width="100" height="50">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active; text-white; fs-5" aria-current="page" href="../../inicioAdmin.php" id="menu">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active; text-white; fs-5" aria-current="page" href="../../usuariosAdmin.php" id="menu">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active; text-white; fs-5" href="../../alquilerAdmin.php" id="menu">Alquiler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active; text-white; fs-5" href="../../autoAdmin.php" id="menu">Autos</a>
                    </li>
                </ul>
                <ul class="nav nav-pills">
                        <li class="nav-item dropdown; position-absolute top-0 end-0" id="botonBien">
                                <a class="nav-link dropdown-toggle; fs-5" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" id="menu">Bienvenido 
                                <?php echo $_SESSION['nombreUsuario']; ?></a>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../cerrarSesion.php">Cerrar Sesión</a></li>
                                </ul>
                        </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <center>
        <h2 id="titulo">Nuevo Auto</h2>
    </center>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

        <fieldset>
            <legend><span class="number">1</span>Llene todos los campos para agregar un nuevo Auto</legend>

            <label>Marca</label>
            <i class="bi bi-person-fill"></i>
            <input name="marca" class="form-control" placeholder="Marca" type="text" id="floatingInput" required>

            <label>Placa</label>
            <i class="bi bi-person-fill"></i>
            <input name="placa" class="form-control" placeholder="Placa" type="text" id="floatingInput" required>

            <label>Tipo</label>
            <i class="bi bi-person-fill"></i>
            <input name="tipo" class="form-control" placeholder="Tipo" type="text" id="floatingInput" required>

            <label>Estado</label>
            <i class="bi bi-person-fill"></i>
            <input name="estado" class="form-control" placeholder="Estado" type="text" id="floatingInput" required>

           
           
            <br>
            <br>
            <div class="form-group">
                <input type="file" name="fotoAuto" class="form-control"  required>
            </div>
            <br>
            <br>
            <input class="btn btn-primary" id="agregar" type="submit" value="Agregar">
            <br>
            <br>
            <a href="../../autoAdmin.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
        </fieldset>

    </form>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>