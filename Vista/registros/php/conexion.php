<?php
$conexion = mysqli_connect('localhost', 'root', '','guppy');

function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
}
?>