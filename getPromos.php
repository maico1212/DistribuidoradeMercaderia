<?php 
	require("conexbd.php");
	$request = $conexion->prepare("SELECT * FROM promo");
	$request->execute();
	$result = $request->fetchAll();


	$promos = array();

	foreach ($result as $value)
	{
		$item = array(
			"prod" => $value['producto'],
			"promo" => $value['preciopromo']
		);
        array_push($promos, $item);	
	}
 ?>