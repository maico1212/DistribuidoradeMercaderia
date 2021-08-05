<?php
	$nro=$_POST['nro']; 	
	$idUser=$_POST['idUser'];
	require("conexbd.php");

	$statement = $conexion->prepare("SELECT * FROM carro WHERE pendiente='0'");
 
	$statement->execute();

	$row = $statement->fetchAll();

	$arrayID = array();

	foreach ($row as $value)
	{
		array_push($arrayID, $value['id']);
	}

	$id = $arrayID[$nro];
	$deleter = $conexion->prepare("DELETE FROM `carro` WHERE `id`='$id'");
 
	$deleter->execute();

	$result = $deleter->fetch();

	if($deleter)
	{
		echo 1;
	}
	else
		echo 0;
?>
