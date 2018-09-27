<?php
require_once '../../Controlador/Conteo.entidad.php';
require_once '../../Modelo/Conteo.modelo.php';
require_once ('../../Modelo/dbconfig.php');

// Logica
$conteo = new conteo_visitas();
$model = new conteoVisitasModelo();
$db = database::conectar();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $conteo->__SET('IdConteoVisitas', 					$_REQUEST['IdConteoVisitas']);
            $conteo->__SET('Visitas',   								$_REQUEST['Visitas']);
            $conteo->__SET('FKUsuario',       					$_REQUEST['FKUsuario']);


            $model->ActualizarConteo($conteo);
            print "<script>alert(\"Registro Actualizado Exitosamente.\");window.location='modificar.php';</script>";
            break;

        case 'registrar':
            $conteo->__SET('IdConteoVisitas', 							$_REQUEST['IdConteoVisitas']);
            $conteo->__SET('Visitas',   										$_REQUEST['Visitas']);
            $conteo->__SET('FKUsuario',       							$_REQUEST['FKUsuario']);
	

            $model->RegistrarConteo($conteo);
            print "<script>alert(\"Registro Agregado Exitosamente.\");window.location='modificar.php';</script>";
            break;

        case 'eliminar':
            $model->EliminarConteo($_REQUEST['IdConteoVisitas']);
            print"<script>alert(\"Registro Eliminado Exitosamente.\");window.location='modificar.php'</script>";
            break;

        case 'editar':
            $conteo = $model->ObtenerConteo($_REQUEST['IdConteoVisitas']);
            break;
    }
}

?>
<style type="text/css">
   #boton2 {
    float: right;
    margin-right: 20px;
   }
 </style>

<!DOCTYPE html>
<html lang="es">
  <header>  </header><!--  end header section  -->
    <body>
        <!--Botones-->
        <div class="container">
            <div class="row">
              <div class="col-md-6">
                  <div class="panel panel-default">
                  <div class="panel-heading">Nuevo Registro</div>
                  <div class="panel-body">
                    <!-- Button trigger modal -->
                    <center>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">                      
                      Nueva Visita
                    </button>
                    </center>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="panel panel-default">
                  <div class="panel-heading">Reporte PDF</div>
                  <div class="panel-body">
                    <!-- Button trigger modal -->
                        <div class="col-md-8">
                            <a id="boton2"  href="../ConteoVisitas/pdf/"  class="btn btn-default">Reporte PDF</a> 
                        </div>
                  </div>
                </div>     
              </div>
            </div>          
        </div>

        <!--Modal Nuevo registro-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <form class="w3-container" action="?action=<?php echo $conteo->IdConteoVisitas > 0 ? 'actualizar' : 'registrar'; ?>" method="post" >

                    <input type="hidden"  name="IdConteoVisitas" value="<?php echo $conteo->__GET('IdConteoVisitas'); ?>" />
                    
                        <input type="text" class="w3-input" style="width: 45%;float: left;" name="IdConteoVisitas" value="<?php echo $conteo->__GET('IdConteoVisitas'); ?>"  placeholder="Id Conteo Visitas"  />
                        
                        <input type="text" name="Visitas" class="w3-input" style="width: 45%;float: right;" value="<?php echo $conteo->__GET('Visitas'); ?>" placeholder="Numero Visitas"  />
                    
                        <select name="FKUsuario" class="w3-select" style="width: 45%;float: left;" required>
                          <option value="">identificacion Usuario...</option>
                             <?php
                            foreach ($db->query('SELECT * from usuario') as $row) {
                                echo '<option value="' . $row['PKNUsuario'] . '">' . $row['PKNUsuario'] . '</option>';;                        
                                  }
                                ?>
                        </select>


              </div>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Guardar" onclick = "this.form.action = '?action=registrar';"/>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  </div>                       
                </form>
            </div>
          </div>
        </div>
      <!--Fin Modal Nuevo Registro-->

<!-- Formulario Actualizar Registro -->
    
    <div id="div_form" class="w3-container">

    <?php if(!empty($_GET['IdConteoVisitas']) && !empty($_GET['action']) ){ ?>
        <form class="w3-container" action="#" method="post">
        <!--<label> modificar: <?php echo $conteo->__GET('IdConteoVisitas'); ?></label> -->

            <label>Modificar:</label>


            <br><input type="text" name="IdConteoVisitas"   style="display: none; id="" value="<?php echo $conteo->__GET('IdConteoVisitas');?>" placeholder="Id" required>

            <br><input type="text" name="Visitas" id="" class="w3-input" style="width: 45%;float: left;" value="<?php echo $conteo->__GET('Visitas');?>" placeholder="Visitas" required>

            <br><input type="text" name="FKUsuario" id="" class="w3-input" style="width: 45%;float: right;" value="<?php echo $conteo->__GET('FKUsuario');?>" placeholder="Usuario" required>

            

            
            <br><input type="submit" value="Actualizar" onclick = "this.form.action = '?action=actualizar';"/>
        </form>

         <?php };

    $sqli= "SELECT * FROM conteo_visitas";
    $query = $db ->query($sqli);
    if($query->rowCount()>0):?>
    
    <div class="container">
      <div class="panel panel-default">
          <div class="panel-heading">Visitas Clientes.</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table" >
                      <thead>
                          <tr class="w3-light-grey">
                              <th>Id Conteo visitas</th>
                              <th>Visitas</th>
                              <th>Usuario</th>
                              <th>Funcion Editar</th>
                              <th>Funcion Eliminar</th>
                          </tr>
                      </thead>
              
              <?php foreach($model->ListarConteo()as $r): ?>
                  <tr>
                      <td><?php echo $r->__GET('IdConteoVisitas');?></td>
                      <td><?php echo $r->__GET('Visitas');?></td>
                      <td><?php echo $r->__GET('FKUsuario');?></td>
                      <td>
                      <a href="?action=editar&IdConteoVisitas=<?php echo $r->IdConteoVisitas; ?>"><span class=" glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</a>
                      </td>
                      
                      <td>
                      <a href="?action=eliminar&IdConteoVisitas=<?php echo $r->IdConteoVisitas; ?>" onclick="return alert('¿Esta seguro que quiere eliminar este registro?')"><span class=" glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a>
                      </td>
                  </tr>
                  
              <?php endforeach; ?>
              
                  </table>
              </div>
          </div>
        
    <?php else:?>
    
        <h4 class="alert alert-danger">Señor usuario no hay  Registros.</h4>
        
    <?php endif;?>
  </div>

    <script src="../../assets/bootstrap-3.3.7/js/jQuery-2.1.4.min.js"></script>
    <script src="../../assets/bootstrap-3.3.7/js/bootstrap.min.js"></script>
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
</body>

</html>