<?php 
	$idUser=$_POST['idUser'];
	require("conexbd.php");

	$statement = $conexion->prepare("UPDATE producto INNER JOIN carro ON producto.id = carro.producto SET 
    producto.stock = producto.stock-carro.cantidad , carro.pendiente=1 WHERE carro.id_usuario='$idUser' AND carro.pendiente=0");
 
	$statement->execute();

	
	if($statement)
	{
		echo 1;
	}
	else
		echo 2;

 ?>