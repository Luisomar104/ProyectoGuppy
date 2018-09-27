<?php
include('conexion.php');
$id = $_POST['id_factura']; 
$proceso = $_POST['pro'];
$numero_factura = $_POST['numero_factura'];
$id_cliente = $_POST['id_cliente'];
$id_vendedor = $_POST['id_vendedor'];
$condiciones = $_POST['condiciones'];
$total_venta =$_POST['total_venta'];
$estado_factura =$_POST['estado_factura'];
$fecha_factura = date('Y-m-d');
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO facturas (numero_factura, fecha_factura, id_cliente, id_vendedor, condiciones, total_venta, estado_factura)VALUES('$numero_factura','$fecha_factura','$id_cliente','$id_vendedor', '$condiciones', '$total_venta', '$estado_factura')");
	break;
	
	case 'Edicion':
		mysqli_query($conexion,"UPDATE facturas SET numero_factura = '$numero_factura', id_cliente = '$id_cliente', id_vendedor = '$id_vendedor', condiciones = '$condiciones', total_venta = '$total_venta', estado_factura ='$estado_factura'  WHERE id_factura = '$id'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM facturas ORDER BY id_factura ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="300">Numero de Factura</th>
                <th width="200">Cliente</th>
                <th width="150">Id del vendedor</th>
                <th width="150">Condiciones</th>
                <th width="150">Total de Venta</th>
                <th width="150">Estado de Factura</th>
				<th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysqli_fetch_array($registro,MYSQLI_ASSOC)){
		echo '<tr>
				<td>'.$registro2['numero_factura'].'</td>
				<td>'.$registro2['id_cliente'].'</td>
				<td>S/. '.$registro2['id_vendedor'].'</td>
				<td>S/. '.$registro2['condiciones'].'</td>
				<td>S/. '.$registro2['total_venta'].'</td>
				<td>S/. '.$registro2['estado_factura'].'</td>
				<td><a href="javascript:editarProducto('.$registro2['id_factura'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_factura'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>