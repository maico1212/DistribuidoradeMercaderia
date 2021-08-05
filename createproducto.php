<?php

 session_start();

 require "conexbd.php";

if (isset($_POST['submit'])) {
    
    $datosSQL = array (
    ':nombre' => $_POST['nombre'],
    ':marca' => $_POST['marca'],
    ':detalle' => $_POST['detalle'],
    ':stock' => $_POST['stock'],
    ':precio' => $_POST['precio'],
    ':tipo' => $_POST['tipo'],
    


    );

   
    $sql= "INSERT INTO producto (id, nombre, marca, detalle, stock, precio, tipo) VALUES (null, :nombre, :marca, :detalle, :stock, :precio, :tipo)";

    $myinsert = $conexion->prepare($sql);

    $myinsert->execute($datosSQL);

    $lastInsertID = $conexion->lastInsertId();

   
   // $_SESSION['nombre_1']='Producto registrado satisfactoriamente';

    
    $_SESSION['message'] = 'Se ha registrado un nuevo producto';
    $_SESSION['messagee'] = 'No se registró';
   // $_SESSION['message_type']= 'Success';
   
    if ($lastInsertID > 0) {
    
       echo $_SESSION['message'];
      
    }else
    {
       $_SESSION['messagee'];
   //   echo $_SESSION['nombre_2'];
     // echo "No se pudo agragar el Producto"." ". $myinsert->errorInfo();
    }


}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>DISTRUIBUIDORA SAN JUAN</title>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-dark">
  
              
  <a href="#" id="nav-logo">
    <img src="img/logo-secondary.png" class="img-fluid">
  </a>


  <nav class="nav">
  
  <a class="nav-link" href="crudprods.php" style="color: white">Listado de Productos</a>
  
 


   <div class="pos"> 
    
   <h4 style="color: white;">
     Sección Administrador
   </h4>

   </div>

    

</nav>

   <div class="posicon">
  
      <i class="fas fa-user-shield fa-lg"></i>
      
   </div>

   </nav>


   <br>
    <h4 class="text-center">Registrar Producto</h4>

    <div class="container" style="text-align: center">

        <form action="" method="POST" style="text-align: center" enctype="multipart/form-data">

            <div class="form-group">

                <input style="margin-top:10px;" type="text" class="container col-md-5 form-control" name="nombre" placeholder="Nombre del Producto">
                
                <input style="margin-top:10px;" type="text" class="container col-md-5 form-control" name="marca" placeholder="Marca">
                
                <input style="margin-top:10px;" type="text" class="container col-md-5 form-control" name="detalle" placeholder="Detalle">

                <input style="margin-top:10px;" type="int" class="container col-md-5 form-control" name="stock" placeholder="Stock">

                <input style="margin-top:10px;" type="int" class="container col-md-5 form-control" name="precio" placeholder="Precio">

                <input style="margin-top:10px;" type="text" class="container col-md-5 form-control" name="tipo" placeholder="Tipo">

                <input style="margin-top:10px;" type="file" class="container col-md-5 form-control" name="image">

               
                <br>
                <button type="submit" name="submit" class="btn btn-info">Almacenar Producto</button>
                <br>
              
                 
            </div>
        </form>
  
    </div>

   
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>