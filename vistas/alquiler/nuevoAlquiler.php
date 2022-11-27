<?php
    
    require_once '../../controlador/alquiler/datosAlquiler.php';
    require_once '../../controlador/alquiler/agregarAlquiler.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Alquiler </title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="../estilos/estilo.css">
   
</head>
<body>
    <div id="contenedor" >

    
    <h1>Datos del usuario</h1>
    <div class=" col-sm-3 ">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <div class="mb-2">
        <label for="exampleFormControlInput1" class="form-label" >Nombre Cliente</label>

        <select name="cliente" >
            
     <?php
            if($result -> num_rows > 0) {
                        while($row = $result -> fetch_assoc()){
                       
                        echo '<option value="'. $row['idCliente'] . '">'.$row['nombresCli'].'</option>';
                        }
                        $result -> free();
                        } else {
                            echo'<p><em> No existen datos registrados</em></p>';
                    }
                    ?>

        </select>
        
    </div>
    
    <div  class="mb-2">
        <label for="exampleFormControlInput1" class="form-label" >Marca Auto</label>
        <select name="marca" >
        <?php
            if($result2 -> num_rows > 0) {
                        while($row = $result2 -> fetch_assoc()){
                       
                        echo '<option value="'. $row['idauto'] . '">'.$row['marca'].'</option>';
                        }
                        $result2 -> free();
                        } else {
                            echo'<p><em> No existen datos registrados</em></p>';
                    }
             ?>
          

        </select>

    
    </div>
    <?php
         echo '<div  class="mb-2">
         <label for="exampleFormControlInput1" class="form-label">Fecha Alquiler</label>
         <input type="text" name="fechaAlquiler" required>
     </div>
     <div  class="mb-2">
         <label for="exampleFormControlInput1" class="form-label">Fecha Devolución</label>
         <input type="text" name="fechaDevolucion" required>
     </div>
     <div  class="mb-2">
         <label for="exampleFormControlInput1" class="form-label">Precio</label>
         <input type="text" name="precio" required>
     </div>';
        ?>

   
   
   
    <input type="submit" value="Agregar">
    <a href="../../alquilerAdmin.php">Cancelar</a>  
    </form>
  
   
    </div>
   

    </div>
    
</body>
</html>