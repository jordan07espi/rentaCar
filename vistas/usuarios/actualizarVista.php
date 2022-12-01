<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location:validarLogin.php");
}
require_once '../../controlador/usuarios/actualizarUsuario.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/formularios.css" />
    <link rel="stylesheet" href="../../css/navbar.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <title>Actualizar Usuario</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/estilo.css">

</head>

<body>

    <body>
        <div>
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
                                <a class="nav-link dropdown-toggle; fs-5" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" id="menu">Bienvenido Admin</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="cerrarSesion.php">Cerrar Sesión</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <br>
        <br>
        <center>
            <h2 id="titulo">Actualizar Usuario</h2>
        </center>

        <form class=" col-sm-3 " action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data" <fieldset>
            <legend><span class="number">1</span>Llene todos los campos para agregar un nuevo Usuario</legend>

            <label>Nombre Usuario</label>
            <i class="bi bi-person-fill"></i>
            <input name="nombre" class="form-control" placeholder="Nombres" type="text" id="floatingInput" value="<?php echo $nombre ?>" required>

            <label>Contraseña</label>
            <i class="bi bi-lock-fill"></i>
            <input name="contraseña" class="form-control" placeholder="Contraseña" type="text" id="floatingInput" value="<?php echo $contrasenia ?>" required>

            <input class="btn btn-primary" id="agregar" type="submit" value="Actualizar">
            <br>
            <br>
            <a href="../../usuariosAdmin.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
            </fieldset>

        </form>

    </body>

</html>