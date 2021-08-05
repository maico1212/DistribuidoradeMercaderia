<?php
include("conexbd.php");

session_start();
$id='';
$varsession=$_SESSION['user']; //-----------variable de session (user)
$idsession= $_SESSION['id'];//------------variable de sesion (id)
if(($varsession==null)||($varsession==''))
{
    header('Location: unauthorized.html');
}

require("userProfile.php");
?>


<!DOCTYPE html>
<html>
<head>
  <title>Distribuidora San Juan</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <!--------------------------CARROUSEL-------------------->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.css">
  <!------------------------------------------------------->
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="font-awesome/css/all.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

<script>

  

    var idUser = <?php echo $idsession?>;
    
    //console.log(array);
</script> 
</head>






<body>



  <nav class="navbar navbar-expand-lg navbar-dark">
    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
  <a href="#" id="nav-logo">
      <img src="img/logo-secondary.png" class="img-fluid">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>



  

</nav>










    <div class="wrapper">
        <!-- - --------------------------------------------------- Sidebar  -->
        <nav id="sidebar" class="hidder">
            <span class="bg-info"><?php //echo $idsession; ?></span>
            <ul class="list-items container">
                <li>
                    <a href="main.php"><i class="fas fa-store"></i>Tienda</a>
                </li>
                <li id="cart-btn">
                    <a href="#"><i class="fas fa-shopping-cart"></i>Carrito</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-box-open"></i>Pedidos</a>
                </li>
                <!--li>
                    <a href="#"><i class="fas fa-envelope"></i>Contacto</a>
                </li-->
            </ul>
            <form action="destroyer.php">
                <input type="submit" name="" id="session-destroyer" name="session-destroyer" style="display: none;">
                <label for="session-destroyer" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i>Cerrar Sesión</label>
            </form>
            

        </nav>

  <!-- -------------------------------------------------------Page Content  -->
<div id="content" class="container">





<div class="card mb-3 col-md-6 container" style="height:90%;">
  <img src="img/users/avatar.png.png" class="card-img-top container" style="max-width: 60%;">
  <div class="card-body">
    <h5 class="card-title"><strong><?php echo $resul[0]['nombre'];?></strong></h5>
    <p class="card-text martopcito">Correo : <?php echo $resul[0]['correo'];?></p>
    <p class="card-text martopcito">Teléfono : <?php echo $resul[0]['telefono'];?></p>
    <button type="button" class="btn btn-info martop" data-toggle="modal" data-target="#myModal2"><i class="far fa-edit"></i>Actualizar datos</button>
  </div>
</div>

         
          



      



</div>




<!---------------------------------------------MODAL DEL UPDATE--->
<!--------------MODAL2--------------------->
  <div class="modal" tabindex="-1" role="dialog" id="myModal2">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="col-md-12">

          <form action="" method="POST">    
              <div class="form-group">           
              <strong>Nombre</strong>
                <input type="text" name="nombre" value="<?php echo $resul[0]['nombre'];?>" class="form-control" placeholder="Nombre">
              </div>

              <div class="form-group">
              <strong>Correo</strong>
               <input type="text" name="correo" value="<?php echo $resul[0]['correo'];?>" class="form-control" placeholder="ejemplo@gmail.com">
              </div>

              <div class="form-group">
              <strong>Numero de Telefono</strong>
               <input type="text" name="telefono" value="<?php echo $resul[0]['telefono'];?>" class="form-control" placeholder="ej:154222111">
              </div>

              <div class="form-group">
              <strong>Contraseña Actual</strong>
               <input type="password" name="passact" class="form-control" placeholder="Actual Contraseña">
              </div>

              <div class="form-group">
              <strong>Contraseña Nueva</strong>
               <input type="password" name="passnue" class="form-control" placeholder="Nueva Contraseña">
              </div>

              <button class="btn btn-info" type="submit" name="submit">Actualizar</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
<!-------------FINMODAL2---------------->
<!--------------------------------------------------------------------->



<!------------------------------------MODAL CARRITO-------------------->
<div id="modal-cart">
    <div class="content container" style="padding: 10px;">
        <h3 class="text-center">El Carrito</h3>
        <div>
          <ul id="list-cart">
            
          </ul>
              
        </div>
         <a href="#" class="btn btn-custom col" id="addpedido">Confirmar Pedido</a>
    </div>
    <a href="#" class="close-cart-modal">
        <i class="far fa-times-circle" style="font-size:30px;color: #ffffff;"></i>
      </a>
</div>
<!--------------------------------------------------------------------->

<div id="load-screen">
    <div class="col-md-6 container text-center" style="margin-top: 10em;">
      <div class=" col-md-12 container">
        <img src="img/logo-primary.png" class="img-fluid col-md-12" style="width: 70%;">
      </div>
        <div class="spinner-border col-md-12 container" style="width: 3rem; height: 3rem;color:#ae174c; margin-top: 30%;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    
</div>

<script src="js/jquery.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/owlresponsive.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/spiner.js"></script>
<script src="js/main.js"></script>



</body>
</html>

