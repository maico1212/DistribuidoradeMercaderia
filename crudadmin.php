<?php 

include("conexbd.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">


  <title>Document</title>
</head>
<body>
  


    <nav class="navbar navbar-expand-lg navbar-dark">

    <a href="#" id="nav-logo">
    <img src="img/logo-secondary.png" class="img-fluid">
    </a>
   
    <a href="admin.php" style="color:white;">Home</a>
    &nbsp;
    &nbsp;
    &nbsp;
  <h4 style="color: white;">Sección Administrador</h4>



</nav>



    
    <?php if(isset($_SESSION['message'])){ ?>

         <div class="alert alert-Success alert-<?=$_SESSION['message_type']?> fade show" role="alert">
         <?= $_SESSION['message']?>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
    <?php session_unset(); } ?>
    

  
       <table  class="table table-bordered"> 
       <thead> 
           <tr>
             <th>Nombre</th>
             <th>Correo</th> 
             <th>Telefono</th> 
             <th>Pass</th>
             <th>Admin</th>
           <th>Accion</th>          
           </tr>
       </thead>
       <tbody>
         <?php
            /*$query = "SELECT * FROM usuario";*/
            /*$result_tablitas = mysqli_query($conexion, $query);*/
            $statament = $conexion->prepare('SELECT * FROM usuario');
            $statament->execute();
            $resultado = $statament->fetchAll();

           foreach ($resultado as $row)
           /*while($row = mysqli_fetch_array($result_tablitas))*/ { ?>
                <tr>
                        <td><?php echo $row['nombre']  ?></td>
                        <td><?php echo $row['correo']  ?></td>
                        <td><?php echo $row['telefono']  ?></td>
                        <td><?php echo $row['pass']  ?></td>
                        <td><?php echo $row['admn']  ?></td>
                      <!--  <td><?php// echo $row['created_ad']  ?></td> -->
                        <td>
                        <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-warning">
                         Editar
                        </a>
                        </td>
                        <td>
                          <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                            Eliminar
                              </a>
                        </td>
                </tr>
       <?php } ?>
       </tbody>
       </table>


    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>





































