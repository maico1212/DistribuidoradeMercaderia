<?php 
	
	require("conexbd.php");
	session_start();
	$user=$_POST['user'];
	$pass=$_POST['pass'];

	if($user!='admin'){
		$pass = hash('sha256', $pass);
	}
	$result = $conexion->prepare("SELECT * FROM usuario WHERE nombre = '$user' AND pass = '$pass' ");
 
	$result->execute();

	$row = $result->fetchAll();



	//--------pregunta si el usuario existe, y en caso de que exista pregunta que tipo de usuario es-------------------------------

	if(($row!=false)&&($row[0]['nombre']==$user))
	{
		if($row[0]['admn']==false)
		{
			
			$_SESSION['user']=$row[0]['nombre'];//---se crea la variable de sesion
			$_SESSION['id']=$row[0]['id'];
			echo 1;
		}
		else
		{
			
			$_SESSION['user']=$row[0]['nombre'];//---se crea la variable de sesion
			echo 2;

		}
	}
	else{
		echo '<div class="alert alert-danger" role="alert">
				Usuario o contraseña incorrectos
				</div>';
	}
	
	/*if(($row!=false)&&($row[0]['nombre']==$user)&&($row[0]['admn']==false)){
		echo 1;
	}
	else{
			if($row[0]['admn']==true){
				echo "2";
			}else{
				echo '<div class="alert alert-danger" role="alert">
				Usuario o contraseña incorrectos
				</div>';}
		 }	  */
?>