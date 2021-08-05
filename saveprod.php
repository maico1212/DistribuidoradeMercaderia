<?php

 include("conexbd.php");

if (isset($_POST['saveproducto'])){

   $nombre = $_POST['nombre'];
   $marca = $_POST['marca'];
   $detalle = $_POST['detalle'];
   $stock = $_POST['stock'];
   $precio = $_POST['precio'];
   $tipo = $_POST['tipo'];
   $img = '';
   
    /*$query= "INSERT INTO producto (id, nombre, marca, detalle, stock, precio, tipo) VALUES (null,'$nombre','$marca','$detalle','$stock','$precio', '$tipo')";
   $result= mysqli_query($conex, $query);*/
   $query = $conexion->prepare("INSERT INTO producto (id, nombre, marca, detalle, stock, precio, tipo, img) VALUES (null, :nombre, :marca, :detalle, :stock, :precio, :tipo, :img)");
   $query->execute(array(
      ':nombre' => $nombre,
      ':marca' => $marca,
      ':detalle' => $detalle,
      ':stock' => $stock,
      ':precio' => $precio,
      ':tipo' => $tipo,
      ':img' => $img
   ));
     if(!$query) {

        die("Query failed");
     }

     $_SESSION['message'] = 'Registro guardada satisfactoriamente';
     $_SESSION['message_type']= 'Success';

     header("Location: crudprod.php");
   
}
?>