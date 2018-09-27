<?php

if(!empty($_POST)){
	if(isset($_POST["EstadoRol"])){
		if($_POST["EstadoRol"]!=""){
			include "conexion.php";
			
			$sql = "update rol set EstadoRol=\"$_POST[EstadoRol]\" where idRol=".$_POST["idRol"];
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