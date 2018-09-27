<?php

include "conexion.php";

$user_id=null;
$sql1= "select * from tipoproducto";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table">
<tr class="info">
	<th>IdTipoProducto</th>
	<th>Descripcion</th>
	<th>Acciones</th>
</tr>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["IdTipoProducto"]; ?></td>
	<td><?php echo $r["DescripcionTipoProducto"]; ?></td>
	<td style="width:150px;">
		<a data-id="<?php echo $r["IdTipoProducto"];?>" class="btn btn-edit btn-sm btn-default"><i class="glyphicon glyphicon-edit"></i></a>
		<a href="#" id="del-<?php echo $r["IdTipoProducto"];?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-trash"></i></a>
		<script>
		$("#del-"+<?php echo $r["IdTipoProducto"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				$.get("./php/eliminar.php","IdTipoProducto="+<?php echo $r["IdTipoProducto"];?>,function(data){
					loadTabla();
				});
			}

		});
		</script>
	</td>
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
  <!-- Modal -->
  <script>
  	$(".btn-edit").click(function(){
  		id = $(this).data("id");
  		$.get("./php/formulario.php","id="+id,function(data){
  			$("#form-edit").html(data);
  		});
  		$('#editModal').modal('show');
  	});
  </script>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Actualizar</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->