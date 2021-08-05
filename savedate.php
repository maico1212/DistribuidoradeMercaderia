<?php

 include("conexbd.php");

if (isset($_POST['savedate'])){

   $nombre = $_POST['nombre'];
   $correo = $_POST['correo'];
   $telefono = $_POST['telefono'];
   $pass = $_POST['pass'];
   $admin = $_POST['admin'];

 /*$query= "INSERT INTO usuario (id, nombre, correo, telefono, pass, admn) VALUES (null,'$nombre','$correo','$telefono','$pass','$admin')";
 $result= mysqli_query($conex, $query);*/
 $statament = $conexion->prepare('INSERT INTO usuario (id, nombre, correo, telefono, pass, admn) VALUES (null, :nombre, :correo, :telefono, :pass, :admn)');
 $sentencia->execute(array(
    ':nombre' => $nombre,
    ':correo' => $correo,
    ':telefono' => $telefono,
    ':pass' => $pass,
    ':admn' => $admin
));
 $resultado = $statament->fetchAll();
     if(!$resultado) {

        die("Query failed");
     }

     echo 'saved';

     $_SESSION['message'] = 'Tarea guardada satisfactoriamente';
     $_SESSION['message_type']= 'Success';

     header("Location: crudadmin.php");
   
   // echo $title;
    //echo $description;

}

