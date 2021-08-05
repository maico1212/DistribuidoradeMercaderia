<?php

   include("conexbd.php");

     if(isset($_GET['id'])){
      
        $id= $_GET['id'];
         
        /*$query= "DELETE FROM usuario WHERE id=$id";*/
        /*$result= mysqli_query($conex, $query);*/
        $query = $conexion->prepare("DELETE FROM usuario WHERE id= '$id'");
        $query->execute();
        $result = $query->fetch();

        if($result){
            die("ERRPR-Problema en eliminar el usuario");
        }
     
        $_SESSION['message'] = 'Registro eliminado satisfactoriamente';
        $_SESSION['message_type']= 'Success';

        header("Location: crudadmin.php");
     }

?>