<?php 

include('conexbd.php');

$user= $_POST['idUser'];
$producto = $_POST['productId'];
$cantidad = $_POST['cant'];
	
	
$conexion = new PDO('mysql:host=localhost;dbname=dristr', 'root', '');

			
//$req=$conexion->prepare("UPDATE carro SET cantidad=cantidad+'$cantidad' WHERE id_usuario='$user' AND producto='$producto'");







$sentencia = $conexion->prepare('INSERT INTO carro (id, id_usuario, producto, cantidad) VALUES (null,:id_usuario, :producto, :cantidad)');


$sentencia->execute(array(
    ':id_usuario' => $user,
    ':producto' => $producto,
    ':cantidad' => $cantidad
 ));

if(!$sentencia) {
	echo 0;
    die("Query failed");
}
else
{
	echo 1;
}  	


 ?>