<?php
include('conexion.php');

$id = $_POST['id'];


//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM facturas WHERE id_factura = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM facturas ORDER BY id_factura ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="300">Numero de Factura</th>
                <th width="200">Id del Cliente</th>
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