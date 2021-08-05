<?php

//---backend de perfil  esto fede
$statament = $conexion->prepare("SELECT * FROM usuario WHERE id='$idsession'");
$statament->execute();
$resul = $statament->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $ids = $idsession;  
  $pass = $resul[0]['pass'];
  $passA= hash('sha256', $_POST['passact'] );
  
  if( $passA == $pass){ 
    $passN= hash('sha256', $_POST['passnue'] );
    $datosSLQ = array( ':pass' => $passN);
    $sql = "UPDATE usuario SET pass = :pass where id = $ids";
    $resul = $conexion->prepare($sql);
    $resul->execute($datosSLQ);     
  }

  $datosSLQ = array( ':nombre' => $_POST['nombre'], ':correo' => $_POST['correo'], ':telefono' => $_POST['telefono']);
  $sql = "UPDATE usuario SET nombre = :nombre, correo = :correo, telefono = :telefono where id = $ids";
  $resul = $conexion->prepare($sql);
  $resul->execute($datosSLQ);

  //echo '<div class="alert alert-success" role="alert">Actualización Correcta</div>';
  header("Location: user.php");
}
//--- Fin de backend de perfil

?>