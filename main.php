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

  <div id="search-form">
   
    <!--form class="form-inline" >
      <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Búsqueda" aria-label="Search">
      <button class="btn btn-sm btn-light my-2 my-sm-0" type="submit">Buscar</button>
    </form-->
  </div>

  

</nav>










    <div class="wrapper">
        <!-- - --------------------------------------------------- Sidebar  -->
        <nav id="sidebar" class="hidder">
            <span class="bg-info"><?php //echo $idsession; ?></span>
            <ul class="list-items container">
                <li>
                    <a href="user.php"><i class="fas fa-user"></i>Perfil</a>
                </li>
                <li id="cart-btn">
                    <a href="#"><i class="fas fa-shopping-cart"></i>Carrito</a>
                </li>
                <li id="pedido-btn">
                    <a href="#"><i class="fas fa-box-open"></i>Pedidos</a>
                </li>
                <!--li>
                    <a href="#"><i class="fas fa-envelope"></i>Contacto</a>
                </li-->
            </ul>
            <form action="destroyer.php" class="container" >
                <input type="submit" name="" id="session-destroyer" name="session-destroyer" style="display: none;">
                <label for="session-destroyer" class="btn btn-danger" style="cursor:pointer;"><i class="fas fa-sign-out-alt"></i>Cerrar Sesión</label>
            </form>
            

        </nav>

  <!-- -------------------------------------------------------Page Content  -->
<div id="content">



      
      

      <!-----------------------------------BARRA DE OFERTAS------------------->
      <div id="mainer" class="col-md-11 container" style="background-color: #ffffff; border-radius: 5px; padding: 10px 0; margin-top:2em;height:450px;">

          <div class="" style="margin: 20px;">

            <h3 class="">Ofertas</h3>

              <div class="owl-carousel owl-theme">
                
                    <?php include('getProd.php'); ?>

              </div>

          </div>

      </div>
      <!------------------------------------------------------------------------>


</div>




<!---------------------------------------------MODAL DEL PRODUCTO--->

	<div class="product-modal">

		<div class="content row container col-md-6">
			<div class="col-md-12" style="padding: 0;">
        <img src="" class="container text-center big-img" style="max-width: 50%;">
      </div>
      
      <p class="description-product text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla tenetur quod animi unde. Dignissimos dolorem libero, ipsa quos blanditiis, assumenda.</p>

      <form class="col-md-12 row container text-center">

          <div class="col-md-6" style="margin: 0 auto;">
              <p class="text-center" style="color: black; font-size: 15px;">Seleccione Cantidad: </p> 
              <input id="cant-cart" class="form-control-sm" type="number" value="0" min="1" max="" step="1"/>
          </div>
         
          <div class="bottomer row col-md-12">
                <a href="#" class="close-product-modal col btn bg-custom">
                      Cerrar
                </a>
                <a href="#" class="btn bg-info col" id="addtocart">Agregar al carrito</a>
          </div>
        
         
      </form>


		</div>

	</div>
<!--------------------------------------------------------------------->



<!------------------------------------MODAL CARRITO-------------------->
<div id="modal-cart">
    <div class="content col-md-6">
        <h3 class="text-center">El Carrito</h3>
        <div>
          <ul id="list-cart" class="container martop" style="overflow-y:scroll;height: 350px;">
            
          </ul>
          <div class="totalizer col-md-3 container row float-right">
            <p>Total : </p><h5 id="total-cart" class="text-success"></h5>
          </div>

          <!--div class="empty-cartel col-md-9 container">
              <p class="text-center">El Carrito está vacío</p>
          </div-->

        </div>
          <div class="bottomer row col-md-12">
                <a href="#" class="close-cart-modal col btn bg-custom" style="transition:all .5s ease-in-out;">
                      Cerrar
                </a>
                 <a href="#" class="btn bg-info col" id="addpedido">Confirmar Pedido</a>
          </div>
        
    </div>
</div>
<!--------------------------------------------------------------------->



<!------------------------------------MODAL PEDIDOS-------------------->
<div id="modal-pedido">
    <div class="content col-md-6">
        <div class="bg-info" style="display: block;width: 100%;height: 20px;border-radius: 5px 5px 0 0;"></div>
        <h3 class="text-center">Pedidos Confirmados</h3>
        <div style="display: flex;
   align-items: center;">
          <ul id="list-pedidos"  class="container martop" style="overflow-y:scroll;height: 350px;">
            
          </ul>
              <div class="empty-cartel col-md-9 container">
                
                <p class="text-center"><i class="fas fa-box-open"></i> No hay Pedidos Realizados</p>
              </div>

        </div>
        <a href="#" class="close-pedidos-modal btn btn-custom col">
           Cerrar
        </a>
    </div>
    
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





<script>

    var array = <?php echo json_encode($ofertas)?>;

    var idUser = <?php echo $idsession?>;
    
    console.log(array);
</script> 
<script src="js/jquery.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/owlresponsive.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/spiner.js"></script>
<script src="js/main.js"></script>



</body>
</html>