<?php

if(!empty($_POST)){
	if(isset($_POST["IdTipoProducto"]) &&isset($_POST["DescripcionTipoProducto"])){
		if($_POST["IdTipoProducto"]!=""&& $_POST["DescripcionTipoProducto"]!=""){
			include "conexion.php";
			
			$sql = "insert into tipoproducto(IdTipoProducto,DescripcionTipoProducto) values (\"$_POST[IdTipoProducto]\",\"$_POST[DescripcionTipoProducto]\")";
			$query = $con->query($sql);
			if($query!=null){
				//print "<script>alert(\"Agregado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				//print "<script>alert(\"No se pudo agregar.\");window.location='../ver.php';</script>";

			}
		}
	}
}



?>