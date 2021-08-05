<?php

  include("conexbd.php");

      if(isset($_GET['id'])){

           $id= $_GET['id'];
           /*$query ="SELECT * FROM usuario WHERE id = $id";
           $result = mysqli_query($conex, $query);*/
           $result = $conexion->prepare("SELECT * FROM usuario WHERE id = $id");
           $result->execute();
           $row = $result->fetchAll();
           $admin = $row[0]['admn'];
      }
      
     if(isset($_POST['update'])){
        /*$id=$_GET['id'];*/
        $admin= $_POST['admin'];
        
        /*$query = "UPDATE usuario set admin='$admin' WHERE id = '$id'";
        mysqli_query($conex,$query);*/
        $result = $conexion->prepare("UPDATE usuario SET admn = $admin WHERE id = $id");
        $result->execute();
      
        header("Location: crudadmin.php");
    }

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

<a href="crudadmin.php" style="color:white;">Listado de Usuario</a>
&nbsp;
&nbsp;
&nbsp;
<h4 style="color: white;">Sección Administrador</h4>


</nav>


   <div class="container p-4">
      <div class="row"> 
       <div class="col-md-4 mx-auto"> 
         <div class="card card-body"> 
             <form action="editar.php?id=<?php echo $_GET['id'];?>" method="POST">
              <div class="form-group">     
              <strong>Admin </strong>
               <br>
              

               <select name="admin">
                  <option value="1">Administrador</option> 
                  <option value="0">Usuario</option> 
  
               </select>



              </div>
              <button class="btn-success" name="update" conet>Update</button>
            </form>
         </div>
       </div>
      </div>
   </div>






   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  



</body>
</html>
