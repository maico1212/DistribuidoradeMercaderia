<?php

  include("conexbd.php");

      if(isset($_GET['id'])){

           $id= $_GET['id'];
           /*$query ="SELECT * FROM producto WHERE id = $id";
           $result = mysqli_query($conex, $query);*/
           $result = $conexion->prepare("SELECT * FROM producto WHERE id = $id");
           $result->execute();
           $row = $result->fetchAll();
            
           if (/*mysqli_num_rows($result)*/($row!=false)){
              /*$row = mysqli_fetch_array($result);*/
              $nombre= $row[0]['nombre'];
              $marca= $row[0]['marca'];
              $detalle= $row[0]['detalle'];
              $stock= $row[0]['stock'];
              $precio= $row[0]['precio'];
              $tipo= $row[0]['tipo'];
              $img= $row[0]['img'];
           }
      }
     if(isset($_POST['update'])){
       
        /*$id=$_GET['id'];*/
        
        $nombre= $_POST['nombre'];
        $marca= $_POST['marca'];
        $detalle= $_POST['detalle'];
        $stock= $_POST['stock'];
        $precio= $_POST['precio'];
        $tipo= $_POST['tipo'];
        $img= $_POST['img'];
        
        /*$query = "UPDATE producto set nombre='$nombre', marca='$marca', detalle='$detalle', stock='$stock', precio='$precio', tipo='$tipo' WHERE id = '$id'";
        mysqli_query($conex,$query);*/
        $result = $conexion->prepare("UPDATE producto SET nombre = $nombre, marca = $marca, detalle = $detalle, stock = $stock, precio = $precio, tipo = $tipo, img = $img WHERE id = $id");
        $result->execute();
        header("Location: crudprod.php");
    }

?>


<?php include("view/headeradmin.html")?>

   <div class="container p-4">
     
      <div class="row"> 
      
       <div class="col-md-4 mx-auto"> 
       
         <div class="card card-body"> 

            <form action="editarprod.php?id=<?php echo $_GET['id'];?>" method="POST">
              
              <div class="form-group">           
              <strong>Nombre del Producto</strong>
                <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Editar Nombre">
              </div>

              <div class="form-group">
              <strong>Marca</strong>
               <input type="text" name="marca" value="<?php echo $marca; ?>" class="form-control" placeholder="Editar Marca">
              </div>

              <div class="form-group">
              <strong>Detalle</strong>
               <input type="text" name="detalle" value="<?php echo $detalle; ?>" class="form-control" placeholder="Editar Detalle">
              </div>

              <div class="form-group">
              <strong>Stock </strong>
               <input type="int" name="stock" value="<?php echo $stock; ?>" class="form-control" placeholder="Editar Stock">
              </div>

              <div class="form-group">              
              <strong>Precio </strong>
               <input type="int" name="precio" value="<?php echo $precio; ?>" class="form-control" placeholder="Editar Precio">
              </div>

              <div class="form-group">
              <strong>Tipo </strong>
               <input type="text" name="tipo" value="<?php echo $tipo; ?>" class="form-control" placeholder="Editar Tipo">
              </div>  

              <div class="form-group">
              <strong>Imagen </strong>
               <input type="text" name="img" value="<?php echo $img; ?>" class="form-control" placeholder="Editar imagen">
              </div>  

              <button class="btn-success" name="update">Actualizar</button>
            </form>
         </div>
       </div>
      </div>
   </div>
<?php include("view/footeradmin.html")?>