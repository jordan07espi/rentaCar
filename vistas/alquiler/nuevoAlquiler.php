<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location:../../indexLogin.html");
}
require_once '../../controlador/alquiler/datosAlquiler.php';
require_once '../../controlador/alquiler/agregarAlquiler.php';
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
    <title>Nuevo Alquiler </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

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
    </div>
    </div>
    <br>
    <center>
        <h2 id="titulo">Actualizar alquiler</h2>
    </center>
    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><span class="number">1</span>Llene todos los campos para agregar el nuevo alquiler</legend>

            <label>Nombre Cliente</label>
            <i class="bi bi-person-fill"></i>
            <div class="form-control" readonly id="floatingInput">
                <select name="cliente">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                            echo '<option value="' . $row['idCliente'] . '">' . $row['nombresCli'] . '</option>';
                        }
                        $result->free();
                    } else {
                        echo '<p><em> No existen datos registrados</em></p>';
                    }
                    ?>

                </select>
            </div>
            <label>Marca Auto</label>
            <i class="bi bi-person-fill"></i>
            <div class="form-control" readonly id="floatingInput">
                <select name="marca">
                    <?php
                    if ($result2->num_rows > 0) {
                        while ($row = $result2->fetch_assoc()) {

                            echo '<option value="' . $row['idauto'] . '">' . $row['placa'] . '</option>';
                        }
                        $result2->free();
                    } else {
                        echo '<p><em> No existen datos registrados</em></p>';
                    }
                    ?>


                </select>
            </div>
            <?php date_default_timezone_set('America/Bogota');
                $date_now         = date('Y-m-d', time());
                $plus_to_month    = date("Y-m-d",strtotime($date_now ."+ 2 month"));
            echo

            '<div>
                <label >Fecha Alquiler</label>
                <i class="bi bi-person-fill"></i>

                <input name="fechaAlquiler" class="form-control" type="text" id="floatingInput" required>
            </div>
        
            <div >
                <label >Fecha Devolución</label>
                <i class="bi bi-person-fill"></i>

                <input name="fechaDevolucion" class="form-control" type="text" id="floatingInput"   required>

            </div>
        
            <label >Precio</label>
            <i class="bi bi-person-fill"></i>
            <div class="col-md-6 inputGroupContainer">
                    <input name="precio" class="form-control" type="text" id="floatingInput"  required>
            </div>
            <input class="btn btn-primary"  id="agregar" type="submit" value="Agregar">
            <br>
            <br>
            <a href="../../alquilerAdmin.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
            <br>';
            ?>
        </fieldset>
    </form>
</body>
 <!-- JavaScript Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>