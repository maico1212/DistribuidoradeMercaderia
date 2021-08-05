<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Administrador</title>
</head>
<body>
    <!-- require'': will produce a fatal error (E_COMPILE_ERROR) and stop the script
         include'': will only produce a warning (E_WARNING) and the script will continue-->
 
    <nav class="navbar navbar-expand-lg navbar-dark">
  <a href="#" id="nav-logo">
        <img src="img/logo-secondary.png" class="img-fluid">
  </a>
  <a class="navbar-brand" href="#">Sección Administrador</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div id="search-form">
   
     <form class="d-flex" action="destroyer.php">
         <input type="submit" name="" id="session-destroyer" name="session-destroyer" style="display: none;">
                <label for="session-destroyer" class="btn btn-outline-light" style="cursor:pointer;"><i class="fas fa-sign-out-alt"></i>Cerrar Sesión</label>
      </form>
  </div>

  

</nav>



<br>
    <a href="crudadmin.php" id="usuario" class="text-center secondary-link center-block">Ver Usuarios</a>
    <div>
	<a href="crudprods.php" id="producto" class="text-center secondary-link center-block">Ver Productos</a>

</body>

</html>