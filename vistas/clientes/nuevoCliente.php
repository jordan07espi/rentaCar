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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/formularios.css" />
    <link rel="stylesheet" href="../../css/navbar.css">
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <title>Nuevo usuario</title>
</head>
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
        <h2 id="titulo">Nuevo Cliente</h2>
    </center>
    <form class="well form-horizontal" action=" " method="post" id="contact_form">
        <fieldset>
            <legend><span class="number">1</span>Llene todos los campos para agregar un nuevo Cliente</legend>

            <label>Nombre Cliente</label>
            <i class="bi bi-person-fill"></i>
            <input name="nombre" class="form-control" placeholder="Nombres"  type="text" id="floatingInput"   required>

            <label>Cédula</label>
            <i class="bi bi-credit-card-2-front-fill"></i>
            <input name="cedula" class="form-control" placeholder="Cédula"  type="text" id="floatingInput"   required>
 
            <label>Dirección</label>
            <i class="bi bi-house-fill"></i>
            <input name="direccion" class="form-control" placeholder="Dirección"  type="text" id="floatingInput"   required>


            <label>Télefono</label>
            <i class="bi bi-telephone-fill"></i>
            <input name="telefono" class="form-control" placeholder="Télefono"  type="text" id="floatingInput"   required>
 
            <input class="btn btn-primary"  id="agregar" type="submit" value="Actualizar">
            <br>
            <br>
            <a href="../../usuariosAdmin.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
        </fieldset>
    </form>
</body>

</html>