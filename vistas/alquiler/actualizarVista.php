<?php
   require_once '../../controlador/alquiler/actualizarAlquiler.php';

   session_start();
   if (!isset($_SESSION['id'])) {
    header("location:../../indexLogin.html");
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
    <link rel="stylesheet" href="../../css/formularios.css" />
    <link rel="stylesheet" href="../../css/navbar.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

</head>
<body >

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
    <br>
    <center>
    <h2 id="titulo">Actualizar alquiler</h2>
</center>
<form   action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
    <fieldset>
            <!-- Form Name -->
        <legend><span class="number">1</span>Edite este formulario para actulaizar en la base de datos</legend>
        <div >
            <label >Nombre Cliente</label>
            <i class="bi bi-person-fill"></i>
            <input  class="form-control" type="text" name="cliente-name" readonly
            id="floatingInput" value="<?php  echo $nombreCli   ?>" required>
        </div>
            
            <div >
                <label >Marca Auto</label>
                <i class="bi bi-person-fill"></i>

                <input  class="form-control" type="text" name="marca-name" id="floatingInput" readonly
            value="<?php echo $marcaAuto ?>" required>

            </div>
            
            <div >
                <label >Fecha Alquiler</label>
                <i class="bi bi-person-fill"></i>

                <input 
                readonly
                name="fechaAlquiler" class="form-control" type="text" id="floatingInput" value="<?php  echo $fechaAlquiler ?>" required>
            </div>
        
            <div >
                <label >Fecha Devolución</label>
                <i class="bi bi-person-fill"></i>

             <?php
             date_default_timezone_set('America/Bogota');
             $date_now         = date('Y-m-d', time());
             $plus_to_month    = date("Y-m-d",strtotime($date_now ."+ 2 month"));
             
             echo  '<input name="fechaDevolucion" class="form-control" type="date" value="'.$fechaDevolucion.'"
                min="'.$date_now.'" max="'.$plus_to_month.'"
                id="floatingInput"   required>'
            ?>
            </div>
        
            <label >Precio</label>
            <i class="bi bi-person-fill"></i>
            <div class="col-md-6 inputGroupContainer">
                    <input name="precio" class="form-control" type="text" id="floatingInput" value="<?php  echo $precioAlquiler ?>" required>
            </div>
            <input class="btn btn-primary"  id="agregar" type="submit" value="Actualizar">
            <br>
            <br>
            <a href="../../alquilerAdmin.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
    </fieldset>
</form>
</body>
 <!-- JavaScript Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>