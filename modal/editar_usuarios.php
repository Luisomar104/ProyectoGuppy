	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar usuario</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_usuario" name="editar_usuario">
			<div id="resultados_ajax2"></div>	

			<div class="form-group">
				<label for="PrimerNombre2" class="col-sm-3 control-label">Nombres</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="PrimerNombre2" name="PrimerNombre2" placeholder="Nombres" required>
				  <input type="hidden" id="mod_id" name="mod_id">
				</div>
			  </div>

			  <div class="form-group">
				<label for="Apellido2" class="col-sm-3 control-label">Apellidos</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="Apellido2" name="Apellido2" placeholder="Apellidos" required>
				</div>
			  </div>

			  <div class="form-group">
				<label for="Usuario2
				" class="col-sm-3 control-label">Usuario</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="Usuario2" name="Usuario2" placeholder="Usuario" pattern="[a-zA-Z0-9]{2,64}" title="Nombre de usuario ( sólo letras y números, 2-64 caracteres)"required>
				</div>
			  </div>        

			  <div class="form-group">
				<label for="Email2" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-8">
				  <input type="email" class="form-control" id="Email2" name="Email2" placeholder="Correo electrónico" required>
				</div>
			  </div>

			  	<div class="form-group">
				  <label class="col-sm-3 control-label">Rol</label>
				  <div class="col-sm-8">
				  <select name="Rol2" id="Rol2" class="form-control" required>
			                <option value="">Seleccione su rol...</option>
			                <?php
			                    foreach ($con->query('SELECT * from rol') as $row) {
			                        echo '<option value="' . $row['idRol'] . '">' . $row['EstadoRol'] . '</option>';;                        
			                    }
			                ?>
			        </select>	
			       </div>
		    	</div>

		    	<div class="form-group">
				  <label class="col-sm-3 control-label">Ciudad</label>
				  <div class="col-sm-8">
				  <select name="Ciudad2"  class="form-control"  id="Ciudad2" required>
			                <option value="">Seleccione Su Ciudad...</option>
			                <?php
			                    foreach ($con->query('SELECT * from ciudad') as $row) {
			                        echo '<option value="' . $row['idCiudad'] . '">' . $row['NombreCiudad'] . '</option>';;                        
			                    }
			                ?>
			        </select>	
			       </div>
		    	</div>
						 	 
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>