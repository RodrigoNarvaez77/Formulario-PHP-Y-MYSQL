<?php
	require 'Conexion.php';
	$id = $_GET['id'];
	$sql = "DELETE  FROM personas WHERE id = '$id'";
        if($conn->query($sql) === TRUE){
            header("Location:index.php");
        }
        else{
            echo "No se pudo eliminar el registro";
        }
?>
