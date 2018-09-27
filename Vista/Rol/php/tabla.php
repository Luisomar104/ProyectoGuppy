<?php

include "conexion.php";

$user_id=null;
$sql1= "select * from rol";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table">
<tr class="info">
	<th>ID Rol</th>
	<th>Roles</th>
	<th>Acciones</th>
</trd>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["idRol"]; ?></td>
	<td><?php echo $r["EstadoRol"]; ?></td>
	<td style="width:150px;">
		<a data-id="<?php echo $r["idRol"];?>" class="btn btn-edit btn-sm btn-default"><i class="glyphicon glyphicon-edit"></i></a>
		<a href="#" id="del-<?php echo $r["idRol"];?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-trash"></i></a>
		<script>
		$("#del-"+<?php echo $r["idRol"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				$.get("./php/eliminar.php","idRol="+<?php echo $r["idRol"];?>,function(data){
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