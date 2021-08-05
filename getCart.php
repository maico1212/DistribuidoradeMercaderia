<?php 

	$idUser=20;//$_POST['idUser'];

	require("conexbd.php");
	require('getPromos.php');

	$statement = $conexion->prepare("SELECT * FROM carro INNER JOIN producto ON carro.id_usuario=$idUser AND carro.producto=producto.id WHERE pendiente='0'");
 
	$statement->execute();

	$row = $statement->fetchAll();



	$items = array();


	$total = 0;


	foreach ($row as $value)
	{
		$price=$value['precio'];
		$ban = 0;
		$i = 0;
		$limit = sizeof($promos);
		
		while(($ban == 0) && ($i<$limit)){

			if($value['producto']==$promos[$i]['prod'])
			{
				$price=$promos[$i]['promo'];
				$ban=1;

			}
			else
				$i++;
		}
		$item = '<li class="list-group-item row" style="margin-bottom: 5px;">
                <div class="col-md-2">
                    <img src="'.$value['path'].'" class="img-fluid">
                </div>
                <div class="col-md-10 row">
                    <p class="col-md-6">'.$value['nombre'].' '.$value['marca'].'</p>
                     <input class="cant-input form-control-sm col-md-2 text-center" type="number" value="'.$value['cantidad'].'" min="0" max="'.($value['disponible']+$value['cantidad']).'" step="1"/>
                    <span class="col-md-3 text-center totitem">$ '.$value['cantidad']*$price.'</span>
                    <span class="col-md-1 crosser-cart" style="display:none;"><i class="fas fa-times-circle"></i></span>
                </div>
            </li>';
        array_push($items, $item);
        $total = $total+($value['cantidad']*$price);
	}


	if(empty($items))
	{
		echo 0;
	}
	else
	{
		echo json_encode(array("items" => $items, "total" => $total));
	}
	






 ?>

