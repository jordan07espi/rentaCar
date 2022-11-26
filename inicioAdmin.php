<?php
require_once 'controlador/inicioAdminControl.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>Bienvenida admin</title>
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
    <div>
        <nav class="navbar navbar-expand bg-dark">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active; text-white" aria-current="page" href="inicioAdmin.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active; text-white" aria-current="page" href="usuariosAdmin.php">Usarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active; text-white" href="#">Alquiler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active; text-white" href="#">Autos</a>
                    </li>
                    </ul>
                    <a class="navbar-brand" > <h4 class="fw-bold; text-white">Bienvenida</h4></a>
                </div>
            </div>
        </nav>
    </div>
    <br>
    <div>
        <a href="nuevoClienteAdmin.php">
            <button class="btn btn-primary" >Nuevo Cliente</button>
        </a>
    </div>
    <br>
    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cedula</th>
                <th scope="col">Dirección</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    if($result -> num_rows > 0) {
                        while($row = $result -> fetch_assoc()){
                        echo '<tr>';
                        echo '<td>' . $row['idCliente'] . '</td>';
                        echo '<td>' . $row['nombresCli'] .'</td>';
                        echo '<td>' . $row['cedula'] . '</td>';
                        echo '<td>' . $row['direccion'] . '</td>';
                        echo '<td>' . $row['telefono'] . '</td>';
                        echo '<td>' . $row['telefono'] . '</td>';
                        echo '<td>';
                        echo '<a href="leer.php?id=' . $row['idCliente'] . '"> 
                        <button type="button" class="btn btn-primary">
                        <i class="bi bi-pencil-square" ></i>
                        </button>
                        </a>';
                        echo '<a href="#?id=' . $row['idCliente'] . '"> 
                        <button type="button" class="btn btn-danger">
                        <i class="bi bi-trash-fill"></i>
                        </button>
                        </a>';
                        echo '</td>';
                        echo '</tr>';
                        }
                        $result -> free();
                        } else {
                            echo'<p><em> No existen datos registrados</em></p>';
                    }
                    
                ?>
        </tbody>
        </table>
    </div>





    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>