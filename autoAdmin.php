<?php
session_start();
if (!isset($_SESSION['id'])){
	header("location:validarLogin.php");
}
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
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active; text-white; fs-5" aria-current="page" href="inicioAdmin.php" id="menu">Clientes</a>
                        </li>
                        <!-- render de nav de CRUD usuarios -->
                        <?php $renderOption=$_SESSION['nombreRol'];  echo $renderOption; ?>
                        <li class="nav-item">
                            <a class="nav-link active; text-white; fs-5" href="alquilerAdmin.php" id="menu">Alquiler</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active; text-white; fs-5" href="autoAdmin.php" id="menu">Autos</a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills">
                        <li class="nav-item dropdown; position-absolute top-0 end-0" id="botonBien">
                                <a class="nav-link dropdown-toggle; fs-5" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" id="menu">Bienvenido 
                                <?php echo $_SESSION['nombreUsuario']; ?></a>
                                </a>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="cerrarSesion.php">Cerrar Sesión</a></li>
                                </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div>
        <a href="vistas/autos/nuevoAuto.php">
            <button class="btn" id="boton">Nuevo Auto</button>
        </a>
    </div>
    <div id="bordeTable">
    <?php if (isset($_SESSION['msg-error-delete-auto'])){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'
            .$_SESSION['msg-error-delete-auto'].
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';unset($_SESSION['msg-error-delete-auto']);
        }  ?>
        <table class="table table-striped">
            <thead class="text-light" id="tabla">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Marca</th>
                <th scope="col">Placa</th>
                <th scope="col">Tipo</th>
                <th scope="col">Estado</th>
                <th scope="col">Estado Alquiler</th>
                <th scope="col">Accioness</th>
            </tr>
            </thead>

            <tbody>
                <?php $count = 0;
                    if($result -> num_rows > 0) {
                        while($row = $result -> fetch_assoc()){
                        echo '<tr>';
                        echo '<td>' . ++$count. '</td>';
                        echo '<td>' . $row['marca'] .'</td>';
                        echo '<td>' . $row['placa'] . '</td>';
                        echo '<td>' . $row['tipo'] . '</td>';
                        echo '<td>' . $row['estado'] . '</td>';
                        echo '<td>' . $row['estadoAlquiler'] . '</td>';
                        echo '<td>';
                        echo '<a href="vistas/autos/actualizarAuto.php?id=' . $row['idauto'] . '"> 
                        <button type="button" class="btn btn-primary">
                        <i class="bi bi-pencil-square" ></i>
                        </button>
                        </a>';
                        echo '<a href="vistas/autos/leerAuto.php?id=' . $row['idauto'] . '"> 
                        <button type="button" class="btn btn-success">
                        <i class="bi bi-eye-fill"></i>
                        </button>
                        </a>';
                       
                        

                        echo '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal'.$row['idauto'] .'">
                        <i class="bi bi-trash-fill"></i>
                  </button>
                  
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal'.$row['idauto'] .'" tabindex="-1" aria-labelledby="exampleModalLabel'.$row['idauto'] .'" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel'.$row['idauto'] .'">Confirmación</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p class="text-dark">¿Está seguro que desea eliminar el registro?</p>
                        </div>
                        <div class="modal-footer">
                          
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a class="btn btn-info"  
                          href="controlador/auto/eliminarAuto.php?id=' . $row['idauto']  . '"> Aceptar</a></button>
                        </div>
                      </div>
                    </div>
                  </div>';
                       







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