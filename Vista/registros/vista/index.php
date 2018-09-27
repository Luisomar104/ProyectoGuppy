<?php
  
  session_start();
  if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
    exit;
        }

  /* Connect To Database*/
  require_once ("../../../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("../../../config/conexion.php");//Contiene funcion que conecta a la base de datos

   
  $active_facturas="";
  $active_productos="active";
  $active_clientes="";
  $active_usuarios="";  
  $title="Filtro Fechas | Le GUPPY";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="../css/estilo.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjava.js"></script>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">-->
<!--<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">-->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
    <?php include("head.php");?>
  </head>
  <body>
  <?php
  include("navbar.php");
  ?>
    <header style="text-align: center;"><h1>Filtro por fechas </h1></header>
    </br>

    <section>
    <div class="container">
    <div class="table-responsive">
    <table class="table">
    	<tr class="">
        	<th width="335"><input type="text" height="100px" placeholder="Busca una factura por: Id de factura  o vendedor" id="bs-prod"/></th>
            <th>Desde&nbsp;&nbsp;<input type="date" id="bd-desde"/></th>
            <th>Hasta&nbsp;&nbsp;<input type="date" id="bd-hasta"/>&nbsp;</th>
            <!--<th width="100"><button id="nuevo-producto" class="btn btn-primary">Nuevo</button></th>-->
            
        </tr>
    </table>
    </div>
    </div>
    </section>
    

    <div class="registros" id="agrega-registros"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>
    <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registra o Edita un Producto</b></h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return agregaRegistro();">
            <div class="modal-body">
				<table  width="100%">

               		  <tr>
                        <th><input type="text"  readonly="readonly" id="id_factura" name="id_factura" readonly="readonly" style="display: none;"/></th>
                    </tr>

                     <tr>
                    

                    <tr>
                	
                    	<th>Número de factura: </th>
                        <th><input type="text" required="required" name="numero_factura" id="numero_factura" maxlength="100"/></th>
                    </tr>

                    <tr>
                    	<th>Cliente: </th>
                        <th><input type="text" required="required" name="id_cliente" id="id_cliente" maxlength="100"/></th>
                    </tr>

                    <tr>
                    	<th>Vendedor: </th>
                        <th><input type="text" required="required" name="id_vendedor" id="id_vendedor"/></th>
                    </tr>

                    <!--<tr>
                    	<th>Condiciones: </th>
                        <th><input style="display: none;" type="text"  required="required" name="condiciones" id="condiciones"/></th>
                    </tr>-->

                    <tr>
                        <th>Total de venta: </th>
                        <th><input type="text"  required="required" name="total_venta" id="total_venta"/></th>
                    </tr>

                    <tr>
                        <th>Estado de factura: </th>
                        <th><input type="text"  required="required" name="estado_factura" id="estado_factura"/></th>
                    </tr>

                    <tr>
                    	<th colspan="2">
                        	<div id="mensaje"></div>
                        </th>
                    </tr>


                </table>
            </div>
            
            <div class="modal-footer">
            	<!--<input type="submit" value="Registrar" class="btn btn-success" id="reg"/>-->
                <input type="submit" value="Registrar"  class="btn btn-primary" id="actualizar_datos"/>
            </div>

            </form>
          </div>
        
      </div>
      
</div><div class="col-md-8">

     <a id="boton2"  href="javascript:reportePDF();"  class="w3-button w3-white w3-border">Reporte PDF</a>
</body>
</html>
 

