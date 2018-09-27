<?php

include "conexion.php";

$user_id=null;
$sql1= "select * from tipoproducto where IdTipoProducto like '%$_GET[s]%' or DescripcionTipoProducto like '%$_GET[s]%'";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>IdTipoProducto</th>
	<th>DescripcionTipoProducto</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["IdTipoProducto"]; ?></td>
	<td><?php echo $r["DescripcionTipoProducto"]; ?></td>
	<td style="width:150px;">
		<a data-id="<?php echo $r["IdTipoProducto"];?>" class="btn btn-edit btn-sm btn-primary">Editar</a>
		<a href="#" id="del-<?php echo $r["IdTipoProducto"];?>" class="btn btn-sm btn-primary">Eliminar</a>
		<script>
$("#del-"+<?php echo $r["id"];?>).click(function(e){
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
  		id = $(this).data("IdTipoProducto");
  		$.get("./php/formulario.php","IdTipoProducto="+IdTipoProducto,function(data){
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