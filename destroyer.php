<?php 

	//----------Holis, te vengo a romper la sesion :)
	
	session_start();
	session_destroy();
	header('Location: index.html');
 ?>