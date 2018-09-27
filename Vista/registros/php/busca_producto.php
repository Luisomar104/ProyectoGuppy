<?php
include('conexion.php'); 
 
$dato = $_POST['dato'];
 
//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion,"SELECT facturas.*,clientes.nombre_cliente,users.PrimerNombre from facturas join clientes on facturas.id_cliente=clientes.id_cliente join users on users.user_id=facturas.id_vendedor WHERE numero_factura LIKE '%$dato%' OR id_vendedor LIKE '%$dato%' ORDER BY id_factura ASC");




//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '
<div class="container">
<div class="table-responsive">
<table class="table">
        	<tr class="info">
        		<!--<th width="150">Id Factura</th>-->
            	<th width="150">Numero de Factura</th>
                <th width="150">Cliente</th>
                <th width="150">Vendedor</th>
                <!--<th width="150">Condiciones</th>-->
                <th width="150">Total de Venta</th>
                <!--<th width="150">Estado de Factura</th>-->
                <th width="150">Fecha de registro</th>
				<!--<th width="50">Opciones</th>-->
            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro,MYSQLI_ASSOC)){
		echo '<tr>
				<!--<td>'.$registro2['id_factura'].'</td>-->
				<td>'.$registro2['numero_factura'].'</td>
				<td>'.$registro2['nombre_cliente'].'</td>
				<td>'.$registro2['PrimerNombre'].'</td>
				<!--<td>'.$registro2['condiciones'].'</td>-->
				<td>'.$registro2['total_venta'].'</td>
				<!--<td>'.$registro2['estado_factura'].'</td>-->
				<td>'.fechaNormal($registro2['fecha_factura']).'</td>
				<!--<td><a href="javascript:editarProducto('.$registro2['id_factura'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_factura'].');" class="glyphicon glyphicon-remove-circle"></a></td>-->
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table></div></div>';
?>