<?php

if(!empty($_POST)){
	if(isset($_POST["DescripcionTipoProducto"])){
		if($_POST["DescripcionTipoProducto"]!=""){
			include "conexion.php";
			
			$sql = "update tipoproducto set DescripcionTipoProducto=\"$_POST[DescripcionTipoProducto]\" where IdTipoProducto=".$_POST["IdTipoProducto"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../ver.php';</script>";

			}
		}
	}
}



?>