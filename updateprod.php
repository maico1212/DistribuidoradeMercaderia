<?php

session_start();

require "conexbd.php";

if (isset($_GET['id'])) {
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    $sql = "SELECT * FROM producto WHERE id = $id";

    $myInsert = $conexion->prepare($sql);

    $myInsert->execute();

    $resultado = $myInsert->fetch();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $datosSLQ = array(':nombre' => $_POST['nombre'], ':marca' => $_POST['marca'], ':detalle' => $_POST['detalle'], ':stock'=> $_POST['stock'],':precio'=> $_POST['precio'], 'tipo'=> $_POST['tipo']);

    $sql = "UPDATE producto SET nombre = :nombre, marca = :marca, detalle = :detalle, stock=:stock, precio=:precio, tipo=:tipo where id = $id";
    $myInsert = $conexion->prepare($sql);

    $myInsert->execute($datosSLQ);
    
    $_SESSION['message'] = 'El producto fue actualizado correctamente';
    echo $_SESSION['message'];
    //  echo "Producto Actualizado";


    $sql = "SELECT * FROM producto WHERE id = $id";
    $myInsert = $conexion->prepare($sql);
    $myInsert->execute();
    $resultado = $myInsert->fetch();


}


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Hello, world!</title>
</head>

<body>




<nav class="navbar navbar-expand-lg navbar-dark">
  
                
  
    
  <a href="#" id="nav-logo">
    <img src="img/logo-secondary.png" class="img-fluid">
  </a>


  <nav class="nav">
  
  <a class="nav-link" href="crudprods.php" style="color: white;">Listado de Productos</a>
 


</nav>

   <div class="pos"> 
    
   <h4 style="color: white;">
     Sección Administrador
   </h4>

   </div>


   <div class="posicon">
  
      <i class="fas fa-user-shield fa-lg"></i>
      
   </div>

   </nav>

<br>
 
 <h4 class="text-center">Editar Producto</h4>


<div class="container">

<br>
  
    <form action="" method="POST"> 

         <div class="form-group">

            <p>Nombre del Producto <input type="text" class="form-control" name="nombre"  value="<?php echo $resultado['nombre'] ?>">       </p>    
              

              <p>Marca <input type="text" class="form-control" name="marca" value="<?php echo $resultado['marca'] ?>"> </p>  
                 
               <p>Detalle <input type="text" class="form-control" name="detalle" value="<?php echo $resultado['detalle'] ?>"></p>  
                 
               <p>Stock <input type="text" class="form-control" name="stock" value="<?php echo $resultado['stock'] ?>"></p>  
                 
               <p>Precio<input type="text" class="form-control" name="precio" value="<?php echo $resultado['precio'] ?>"></p>  
                
               <p>Tipo <input type="text" class="form-control" name="tipo" value="<?php echo $resultado['tipo'] ?>"> </p> 

               <p>Imagen</p>
               <img src='<?php echo $resultado['path']; ?>'>
           
               
                 <br>
                 <br>
                 <button type="submit" name="submit" class="btn btn-danger">Actualizar</button>

        </div>

    </form>
    
</div>






    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  
</body>

</html>