<?php


require "conexbd.php";

$sentencia = 'SELECT * FROM producto';
$buscar="";
if(isset($_POST['buscar'])){

  $buscar = $_POST['buscar'];
  $sentencia = "SELECT * FROM producto WHERE id LIKE '%".$buscar."%' OR nombre LIKE '%".$buscar."%' OR marca LIKE '%".$buscar."%' OR detalle LIKE '%".$buscar."%'";
  
}

$statament = $conexion->prepare($sentencia);
$statament->execute();
$resultado = $statament->fetchAll();

?>


<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> 
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">


   <title>Distribuidora SAN JUAN</title>


  </head>
  <body>


        



<nav class="navbar navbar-expand-lg navbar-dark">
  
                
  
    
  <a href="#" id="nav-logo">
    <img src="img/logo-secondary.png" class="img-fluid">
  </a>


  <nav class="nav" style="color:white;">
  <a class="nav-link active" href="admin.php">Home</a>
  

</nav>





   <div class="pos"> 
    
   <h4 style="color: white">
     Sección Administrador
   </h4>

   </div>


   <div class="posicon">
  
      <i class="fas fa-user-shield fa-lg"></i>
      
   </div>

   </nav>
<br>

    <h4 class="text-center">Lista de Productos</h4>
     


   <br>


   
    <div class="container">

 
    
         <div style="text-align: center">
 
         <a class="btn btn-primary" href="createproducto.php">Crear Producto</a>

         <br> <br>

        
       <form action="crudprods.php" method="POST">
   
       <input type="text" value="<?php echo $buscar ?>" name="buscar">
       <input type="submit" value="Buscar">
 
   
      </form>


    </div>


 

     <br><br>
       
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Detalle</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Tipo</th>
                  
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach ($resultado as $value){ ?>
            <tr>
                <td> <?php echo $value["id"]; ?> </td>
                <td> <?php echo $value["nombre"]; ?> </td>
                <td> <?php echo $value["marca"]; ?> </td>
                <td> <?php echo $value["detalle"]; ?> </td>
                <td> <?php echo $value["stock"]; ?> </td>
                <td> <?php echo $value["precio"]; ?> </td>

                <td> <?php echo $value["tipo"]; ?> </td>


            



                <td>
                   <a class="btn btn-warning" href="updateprod.php?id=<?php echo $value['id'];?>">Editar</a>
                  
               </td>

               <td>
                <a class="btn btn-danger" href="deleteprod.php?id=<?php echo $value['id'];?>">Eliminar</a>
               </td>

            </tr>
            <?php } ?>   


            </tbody>

        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  
  </body>
</html>