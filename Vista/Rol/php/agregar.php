<?php

if(!empty($_POST)){
	if(isset($_POST["idRol"]) &&isset($_POST["EstadoRol"])){
		if($_POST["idRol"]!=""&& $_POST["EstadoRol"]!=""){
			include "conexion.php";
			
			$sql = "insert into rol(idRol,EstadoRol) values (\"$_POST[idRol]\",\"$_POST[EstadoRol]\")";
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