<?php 

include('conexbd.php');

$producto = $_POST['productId'];
$cantidad = $_POST['upd'];
	
	
$conexion = new PDO('mysql:host=localhost;dbname=dristr', 'root', '');

			
$sentencia = $conexion->prepare("UPDATE producto SET disponible = $cantidad WHERE id = $producto");


$sentencia->execute();

if(!$sentencia) {
	echo 0;
    die("Query failed");
}
else
{
	echo 1;
}  	


?>