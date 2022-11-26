<?php
require_once 'controlador/autoAdminControl.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/navbar.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>Bienvenida admin</title>
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
    <div>
        <nav class="navbar navbar-expand navbar-dark" id="navbar">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarScroll">
                <img src="./img/collab.png" alt="" width="100" height="50">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active; text-white" aria-current="page" href="inicioAdmin.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active; text-white" aria-current="page" href="usuariosAdmin.php">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active; text-white" href="alquilerAdmin.php">Alquiler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active; text-white" href="autoAdmin.php">Autos</a>
                    </li>
                    </ul>
                    <a class="navbar-brand" > <h4 class="fw-bold; text-white">Bienvenida</h4></a>
                </div>
            </div>
        </nav>
    </div>
    <br>
    <div>
        <a href="#">
            <button class="btn" id="boton">Nuevo Auto</button>
        </a>
    </div>
    <br>
    <div>
        <table class="table table-striped">
            <thead class="text-light" id="tabla">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Marca</th>
                <th scope="col">Placa</th>
                <th scope="col">Tipo</th>
                <th scope="col">Estado</th>
                <th scope="col">Estado Alquiler</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    if($result -> num_rows > 0) {
                        while($row = $result -> fetch_assoc()){
                        echo '<tr>';
                        echo '<td>' . $row['idauto'] . '</td>';
                        echo '<td>' . $row['marca'] .'</td>';
                        echo '<td>' . $row['placa'] . '</td>';
                        echo '<td>' . $row['tipo'] . '</td>';
                        echo '<td>' . $row['estado'] . '</td>';
                        echo '<td>' . $row['estadoAlquiler'] . '</td>';
                        echo '<td>';
                        echo '<a href="leer.php?id=' . $row['idauto'] . '"> 
                        <button type="button" class="btn btn-primary">
                        <i class="bi bi-pencil-square" ></i>
                        </button>
                        </a>';
                        echo '<a href="#?id=' . $row['idauto'] . '"> 
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