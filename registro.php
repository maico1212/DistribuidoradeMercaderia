<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$usuario = filter_var(trim(strtolower($_POST['usuario'])), FILTER_SANITIZE_STRING);
	$correo = $_POST['correo'];
	$telefono = $_POST['telefono'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	
	$admn = '';
	$errores = '';

	if (empty($usuario) or empty($password) or empty($password2)) {
	
		$errores .= '<div class="alert alert-danger" role="alert">
							Faltan Datos
	 					 </div>';
	} else {

		try {
			$conexion = new PDO('mysql:host=localhost;dbname=dristr', 'root', '');
		} catch (PDOException $th) {
			echo "Error: " . $th->getMessage();
		}

		$sentencia = $conexion->prepare('SELECT * FROM usuario WHERE nombre = :nombre LIMIT 1');

		$sentencia->execute(array(':nombre' => $usuario));

		$resultado = $sentencia->fetch();

		if ($resultado != false) {
			$errores .= '<div class="alert alert-danger" role="alert">
								Nombre de usuario ya existe
		  					</div>';
		}

		// las encriptamos a la contraseña
		$password = hash('sha256', $password);
		$password2 = hash('sha256', $password2);

		if ($password != $password2) {
			$errores .= '<div class="alert alert-danger" role="alert">
								Contraseñas no coinciden
		  					</div>';
		}

		if ($errores == '') {
			
			$sentencia = $conexion->prepare('INSERT INTO usuario (id, nombre, correo, telefono, pass, admn) VALUES (null, :nombre, :correo, :telefono, :pass, :admn)');

			$sentencia->execute(array(
				':nombre' => $usuario,
				'correo' => $correo,
				'telefono' => $telefono,
				':pass' => $password,
				':admn' => $admn
			));

			echo '<div class="alert alert-success" role="alert">
  						Gracias por registrarse
					 </div>';

		}
	}
	if(!empty($errores)){ 
		echo  $errores; 
	}
}
require 'index.html';
 ?>