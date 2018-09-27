<?php
require_once '../../Controlador/ciudadEntidad.php';
require_once '../../Modelo/ciudadModelo.php';
require_once ('../../Modelo/dbconfig.php');
 
// Logica
$ciudad = new ciudad(); 
$model = new ciudadModelo();
$db = database::conectar(); 

if(isset($_REQUEST['action'])) 
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $ciudad->__SET('idCiudad',              $_REQUEST['idCiudad']);
            $ciudad->__SET('NombreCiudad',          $_REQUEST['NombreCiudad']);


            $model->ActualizarCiudad($ciudad);
            print "<script>alert(\"Registro Actualizado Exitosamente.\");window.location='ciudadModificar.php';</script>";
            break;

        case 'registrar':
            $ciudad->__SET('idCiudad',              $_REQUEST['idCiudad']);
            $ciudad->__SET('NombreCiudad',          $_REQUEST['NombreCiudad']);
            
            

            $model->RegistrarCiudad($ciudad);
            print "<script>alert(\"Registro Agregado Exitosamente.\");window.location='ciudadModificar.php';</script>";
            break;

        case 'eliminar':
            $model->EliminarCiudad($_REQUEST['idCiudad']);
            print"<script>alert(\"Registro Eliminado Exitosamente.\");window.location='ciudadModificar.php'</script>";
            break;

        case 'editar':
            $ciudad = $model->ObtenerCiudad($_REQUEST['idCiudad']);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ciudad</title>
        <link rel="stylesheet" href="../../../assets/css/stylew3.css">
        <link rel="stylesheet" type="text/css" href="../../assets/stylenavbar.css">
        <link rel="stylesheet" type="text/css" href="../../assets/style.css">
    </head>
    <header>
        <ul class="topnav">
          <li><a class="active" href="../index.php">Inicio</a></li>
          <li><a href="#">Ciudad</a></li>
          <li><a href="../ConteoVisitas/modificar.php">Conteo Visitas</a></li>
          <li><a href="../Recibo/modificar.php">Recibo</a></li>
          <!--<li><a href="../NewRecibo/modificar.php">Recibo</a></li> -->
          <li><a href="../Rol/rolVista.php">Rol</a></li>
          <li><a href="../Usuario/modificar.php">Usuario</a></li>
          <li><a href="../TamanoPresentacion/tamanopresentacionModificar.php">Tamaño-Presentacion</a></li>
          <li><a href="../TipoProducto/modificar.php">Tipo Producto</a></li>
          <li><a href="../Producto/productoVista.php">Producto</a></li>
          <li class="right"><a href="#">Perfil</a></li>
        </ul>
    </header>
    <body >

<!-- Formulario Nuevo Registro -->
    <br>
        <a id="btnRegistro" href="?action=ver&m=1">Nuevo Registro</a>
    <br><br>
    
    <div id="div_form">
    <?php if(!empty($_GET['m']) && !empty($_GET['action']) ){ ?>
        
        <form action="#" method="POST">     
            <label for="user_login">Codigo postal Ciudad</label>
            <input type="text" name="idCiudad" placeholder="" required>

            <label for="user_login">Nombre Ciudad</label>
            <input type="text" name="NombreCiudad" placeholder="" required>



            
            <br>
            <input type="submit" value="Guardar" onclick = "this.form.action = '?action=registrar';"/>
        </form>
    </div>
    <?php } ?> 
<!--Fin Formulario Nuevo Registro -->

<!-- Formulario Actualizar Registro -->
    
    <div id="div_form">
    
    <?php if(!empty($_GET['idCiudad']) && !empty($_GET['action']) ){ ?>
        <form action="#" method="post">

        <!--<label>ciudad por modificar: <?php echo $ciudad->__GET('idCiudad'); ?></label> -->

            <label>Ciudad por Modificar:</label>


            <br><input type="text" name="idCiudad" id="" value="<?php echo $ciudad->__GET('idCiudad');?>" placeholder="" required>

            <br><input type="text" name="NombreCiudad" id="" value="<?php echo $ciudad->__GET('NombreCiudad');?>" placeholder="" required>
            
            <br><input type="submit" value="Actualizar" onclick = "this.form.action = '?action=actualizar';"/>
        </form>
    </div>
    
    <?php }; 

//Fin formulario actualizar Registro

    $sqli= "SELECT * FROM ciudad";
    $query = $db ->query($sqli);
    if($query->rowCount()>0):?>
    
   
        
        
    <?php else:?>
    
        <h4 class="alert alert-danger">Señor usuario no hay ciudades Registradas.</h4>
        
    <?php endif;?>
    
    </body>
    <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th >Codigo Postal Ciudad</th>
                            <th >Nombre</th>
                            
                            <th >Actualizar Registro</th>
                            <th >Eliminar Registro</th>
                            
                        </tr>
                    </thead>
                    <?php foreach($model->ListarCiudad() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('idCiudad'); ?></td>
                            <td><?php echo $r->__GET('NombreCiudad'); ?></td>
                            <td>
                                <a href="?action=editar&idCiudad=<?php echo $r->idCiudad; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&idCiudad=<?php echo $r->idCiudad; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table> 
    </html>
