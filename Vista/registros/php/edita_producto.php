<?php
//include('conexion.php');
$conexion = @mysqli_connect('localhost', 'root', '','guppy');
if (mysqli_connect_errno($conexion)) {
    echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
}



$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO
$sql = "SELECT * FROM facturas WHERE id_factura = $id";
$valores = mysqli_query($conexion, $sql);
//$valores2 = mysqli_fetch_array($valores,MYSQLI_ASSOC);

	while($almacena=mysqli_fetch_array($valores)){


		$numero_factura = $almacena['numero_factura'];
		$id_cliente = $almacena['id_cliente'];
		$id_vendedor = $almacena['id_vendedor'];
		$condiciones = $almacena['condiciones'];
		$total_venta = $almacena['total_venta'];
	 	$estado_factura = $almacena['estado_factura'];

	 	echo json_encode(array("numero_factura"=>$numero_factura,"id_cliente"=>$id_cliente,"id_vendedor"=>$id_vendedor,"condiciones"=>$condiciones,"total_venta"=>$total_venta,"estado_factura"=>$estado_factura));
	}


?>