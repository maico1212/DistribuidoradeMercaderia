<?php 
	require("conexbd.php");
	$productId=$_POST['productId'];
	$statement = $conexion->prepare("SELECT * FROM producto WHERE id=$productId");
	$statement->execute();
	$row = $statement->fetchAll();
	echo $row[0]['disponible'];

 ?>