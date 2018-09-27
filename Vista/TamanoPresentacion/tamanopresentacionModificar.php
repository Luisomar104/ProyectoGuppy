<?php
require_once '../../controlador/tamanopresentacion.entidad.php';
require_once '../../modelo/tamanopresentacion.modelo.php';
require_once ('../../config/db.php');
require_once ('../../config/conexion.php');

// Logica
$alm = new TamanoPresentacion();
$model = new TamanoPresentacionModelo();
$db = database::conectar();


if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('IdTamanoPresentacion',   $_REQUEST['IdTamanoPresentacion']);
            $alm->__SET('DescripcionTP',          $_REQUEST['DescripcionTP']);


            $model->Actualizar($alm);
            print "<script>alert(\"Registro Actualizado Exitosamente.\");window.location='tamanopresentacionModificar.php';</script>";
            break;

        case 'registrar':
            $alm->__SET('IdTamanoPresentacion',   $_REQUEST['IdTamanoPresentacion']);
            $alm->__SET('DescripcionTP',          $_REQUEST['DescripcionTP']);
            
            

            $model->Registrar($alm);
            print "<script>alert(\"Registro Agregado Exitosamente.\");window.location='tamanopresentacionModificar.php';</script>";
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['IdTamanoPresentacion']);
            print"<script>alert(\"Registro Eliminado Exitosamente.\");window.location='tamanopresentacionModificar.php'</script>";
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['IdTamanoPresentacion']);
            break;
    }
}

?>

<!--Formulario-->
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">
    <head>
        <title>Tam_presentacion</title>
        <
        <link rel="stylesheet" type="text/css" href="../../assets/stylenavbar.css">
        <link rel="stylesheet" type="text/css" href="../../assets/style.css">
        <link rel="stylesheet" href="../../assets/bootstrap-3.3.7/css/bootstrap.min.css">
    </head>
    <header>
        <?php
          
          session_start();
          if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
                header("location: login.php");
            exit;
                }
          
          $active_facturas="active";
          $active_productos="";
          $active_clientes="";
          $active_usuarios="";  
          $title="Recibos | Le GUPPY";
        ?>
    </header>
    <body>

                <!-- Formulario Nuevo Registro -->
             <br>
        <a id="btnRegistro" href="?action=ver&m=1">Nuevo Registro</a><br><br>
    
        <div id="div_form">
         <?php if(!empty($_GET['m']) && !empty($_GET['action']) ){ ?>
        
         <form class="w3-container" action="?action=<?php echo $alm->IdTamanoPresentacion > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <input type="hidden" name="IdTamanoPresentacion" value="<?php echo $alm->__GET('IdTamanoPresentacion'); ?>" />

                        <label >Codigo Tamaño-Presentacion.</label>
                        <input type="text" name="IdTamanoPresentacion" value="<?php echo $alm->__GET('IdTamanoPresentacion'); ?>"  />
                        
                        <label >Descripcion Tamaño-Presentacion.</label>
                        <input type="text" name="DescripcionTP" value="<?php echo $alm->__GET('DescripcionTP'); ?>"  />
                        
                        <button type="submit" class="pure-button pure-button-primary">Guardar</button>
          </form>
          </div>
            <?php } ?> 
            <!--Fin Formulario Nuevo Registro -->

            <!-- Formulario Actualizar Registro -->

             <div id="div_form">
    
    <?php if(!empty($_GET['IdTamanoPresentacion']) && !empty($_GET['action']) ){ ?>
        <form class="w3-container" action="#" method="post">
        <!--<label>producto por modificar: <?php echo $alm->__GET('IdTamanoPresentacion'); ?></label> -->

            <label>Producto por Modificar:</label>


            <br><input type="text" name="IdTamanoPresentacion" id="" value="<?php echo $alm->__GET('IdTamanoPresentacion');?>" placeholder="producto" required>

            <br><input type="text" name="DescripcionTP" id="" value="<?php echo $alm->__GET('DescripcionTP');?>" placeholder="Descripcion Producto" required>

                        
            <br><input type="submit" value="Actualizar" onclick = "this.form.action = '?action=actualizar';"/>
        </form>
    </div>

    <?php }; 
            //Fin formulario actualizar Registro

    $sqli= "SELECT * FROM tamanopresentacion";
    $query = $db ->query($sqli);
    if($query->rowCount()>0):?>
    
    <br><h1>Tamaño presentacion</h1> <br>
    <div class="container">
    <div class="w3-responsive">
        <table class="w3-table-all w3-hoverable">
            <thead>
                <tr>
                      <th >Tamaño-Presentacion</th>
                        <th >Descripcion Tamaño-Presentacion</th>
                        <th >Editar Registro</th>
                        <th >Elimnar Registro</th>
                </tr>
            </thead>

    
    <?php foreach($model->Listar()as $r): ?>
        <tr>
            <td><?php echo $r->__GET('IdTamanoPresentacion'); ?></td>
            <td><?php echo $r->__GET('DescripcionTP'); ?></td>
             <td>
                <a href="?action=editar&IdTamanoPresentacion=<?php echo $r->IdTamanoPresentacion; ?>">Editar</a>
             </td>
             <td>
                <a href="?action=eliminar&IdTamanoPresentacion=<?php echo $r->IdTamanoPresentacion; ?>">Eliminar</a>
            </td>
        </tr>
        
    <?php endforeach; ?>
    
        </table>
      </div>
    </div>
        
    <?php else:?>
    
        <h4 class="alert alert-danger">Señor usuario no hay productos registrados.</h4>
        
    <?php endif;?>
    
    </body>
    </html>



