<?php

   include("conexbd.php");

     if(isset($_GET['id'])){


        $id= $_GET['id'];

        $query = $conexion->prepare("DELETE FROM producto WHERE id= '$id'");
        $query->execute();
        $result = $query->fetch();

        if($result){

            die("ERROR-Probrema en eliminar el producto");

        }
        $_SESSION['message'] = 'Producto eliminado satisfactoriamente';
        $_SESSION['message_type']= 'Success';
        
        header("Location: crudprods.php");
     }

?>