
<?php

try {
    $host_name= 'mysql:host=localhost;dbname=dristr';
    $user = 'root';
    $pass = '';

    $conexion = new PDO($host_name,$user,$pass);

    //echo "Conexion correcta";
} catch (PDOException $e) {
    echo "Error". $e->getMessage();
}

?>