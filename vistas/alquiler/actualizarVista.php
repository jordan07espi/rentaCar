<?php
   require_once '../../controlador/alquiler/actualizarAlquiler.php';

   /*            */
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="../estilos/estilo.css">

</head>
<body >
    <div id="contenedor" class="container-sm ">

    
    
   
    <form class="col-sm-7 p-3 rounded-3" style="background-color: #8DA9C4;"  action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
    <h1>Actualizar Alquiler</h1>
    <p>Edite los datos del alquiler para actualizarlo en la base de datos</p>    
    <div class="row mb-4">
                <div class="col-sm-6">
                    <label for="cliente-name" class="form-label">Cliente</label>
                    <input  class="form-control" type="text" name="cliente-name" readonly
                    id="cliente-name" value="<?php  echo $nombreCli   ?>" required>
                </div>
                <div class="col-sm-6">
                    <label for="marca-name" class="form-label">Marca</label>
                    <input  class="form-control" type="text" name="marca-name" id="marca-name" readonly
                    value="<?php echo $marcaAuto ?>" required>

                </div>  
        </div>
        <div class="row mb-4">
            <div class="col-sm-6">
                <label for="fechaAlquiler" class="form-label">Fecha alquiler</label>
                <input  class="form-control" type="date" name="fechaAlquiler" id="fechaAlquiler" value="<?php  echo $fechaAlquiler ?>" required>
            </div>
            <div class="col-sm-6 ">
                <label for="fechaDevolucion" class="form-label">Fecha devolución</label>
                <input  class="form-control" type="date" name="fechaDevolucion" id="fechaDevolucion" value="<?php  echo $fechaDevolucion ?>" required>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-sm-4">
                <label for="precio" class="form-label">Precio</label>
                <input  class="form-control" type="text" name="precio" id="precio" value="<?php  echo $precioAlquiler ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
            <input class="btn btn-success text-white mb-2 " type="submit" name="submit" value="Actualizar">
            </div> 
            <div class="col-sm-2">
            <a class="btn btn-secondary text-white mb-2" href="../../alquilerAdmin.php">Atrás</a>
            </div>
        </div>
   </form>

   </div>
 
    
</body>
</html>