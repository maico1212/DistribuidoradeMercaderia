<?php include("conexbd.php")?>
<?php include("view/header.html")?>

   <div class="container p-4">
    
    <div class="row">
    
       <div class="col-md-4">
  
       <!--<script>
          var closebtns = document.getElementsByClassName("close");
          var i;

          for (i = 0; i < closebtns.length; i++) {
            closebtns[i].addEventListener("click", function() {
            this.parentElement.style.display = 'none';
              });
            }
      </script>-->
       <?php if(isset($_SESSION['message'])){ ?>
            <div class="alert alert-success alert-<?=$_SESSION['message_type']?> fade show" role="alert">
            <?= $_SESSION['message']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span class="close" aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php session_unset(); } ?>
       
         <div class="card card-body text-center">
           
         <div>
          <strong>Registro de Producto</strong>
         </div>
         <br>

            <form action="saveprod.php" method="POST">
            
               <div class="form-group">
               
                  <input type="text" name="nombre" class="form-control"
                  placeholder="Nombre" autofocus>
              
                  <input type="text" name="marca" class="form-control"
                  placeholder="Marca" autofocus>

                  <input type="text" name="detalle" class="form-control"
                  placeholder="Detalle" autofocus>

                  <input type="text" name="stock" class="form-control"
                  placeholder="Stock" autofocus>

                  <input type="text" name="precio" class="form-control"
                  placeholder="Precio" autofocus>

                  <input type="text" name="tipo" class="form-control"
                  placeholder="Tipo" autofocus>

                  <input type="text" name="img" class="form-control"
                  placeholder="Imagen" autofocus>

               </div>

               <input type="submit" class="btn btn-success btn-block" name="saveproducto" value="Registrar Producto">
            
            </form>
         </div>
       </div>
    
     <div class="col-md-8">
          <table  class="table table-bordered"> 
          <thead> 

              <tr>
              
              <th>Nombre</th>
              <th>Marca</th> 
              <th>Detalle</th> 
              <th>Stock</th>
              <th>Precio</th>
              <th>Tipo</th>
              <th>Imagen</th>
              <th>Accion</th>          
              
              </tr>

          </thead>
          <tbody>
            <?php
               
               /*$query = "SELECT * FROM producto";
               $result_tablitas = mysqli_query($conex, $query);*/
               $statament = $conexion->prepare('SELECT * FROM producto');
               $statament->execute();
               $resultado = $statament->fetchAll();
              
               foreach ($resultado as $row)
             /*while($row = mysqli_fetch_array($result_tablitas))*/{ ?>
                   <tr>     
                           <td><?php echo $row['nombre']  ?></td>
                           <td><?php echo $row['marca']  ?></td>
                           <td><?php echo $row['detalle']  ?></td>
                           <td><?php echo $row['stock']  ?></td>
                           <td><?php echo $row['precio']  ?></td>
                           <td><?php echo $row['tipo']  ?></td>
                           <td><?php echo $row['path'] ?></td>
                           
                         <!--  <td><?php// echo $row['created_ad']  ?></td> -->
                           <td>

                           <a href="editarprod.php?id=<?php echo $row['id']?>" class="btn btn-secondary">   
                            <i class="fas fa-marker"></i>       
                           </a>
                           </td>                           
                           <td>

                             <a href="deleteprod.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                               <i class="far fa-trash-alt"></i>
                                 </a>
                           </td>     
                   </tr>
          <?php } ?>
          </tbody>
          </table>
     </div>
    </div>
   </div>
          

 <?php include("view/footer.html")?>




