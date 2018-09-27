<?php
  
  session_start();
  if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
    exit;
        }

  /* Connect To Database*/
  require_once ("../../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("../../config/conexion.php");//Contiene funcion que conecta a la base de datos
  

  $active_facturas="";
  $active_productos="active";
  $active_clientes="";
  $active_usuarios="";  
  $title="Rol | Le GUPPY";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
  <?php
  include("navbar.php");
  ?>		
<!-- Button trigger modal -->


<div class="container">
    <div class="panel panel-info">
    <div class="panel-heading">
      <form class="form-inline" role="search" id="buscar">
        <div class="btn-group pull-right">
        <a data-toggle="modal" href="#newModal" class="btn btn-primary"><span class="glyphicon glyphicon-plus" ></span> Nuevo Rol</a>
      </div>
      <h4><i class='glyphicon glyphicon-search'></i> Buscar Rol</h4>
    </div>
      <div class="panel-body">
        
      <div class="col-md-5 form-group">
        <input type="text" name="s" class="form-control" placeholder="Buscar">
      </div>
      <button type="submit" class="btn btn-default">&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;Buscar</button>
    </form>

<br>
  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">

<form role="form" method="post" id="agregar">
  <div class="form-group">
    <label for="idRol">idRol</label>
    <input type="text" class="form-control" name="idRol" required>
  </div>

  <div class="form-group">
    <label for="EstadoRol">EstadoRol</label>
    <input type="text" class="form-control" name="EstadoRol" required>
  </div>

  

  <button type="submit" class="btn btn-default">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<div id="tabla"></div>
      </div>
    </div>  
    
  </div>

</div>
</div>
</div>
<script src="../../js/bootstrap.min.js"></script>
<script>

function loadTabla(){
  $('#editModal').modal('hide');

  $.get("./php/tabla.php","",function(data){
    $("#tabla").html(data);
  })

}

$("#buscar").submit(function(e){
  e.preventDefault();
  $.get("./php/busqueda.php",$("#buscar").serialize(),function(data){
    $("#tabla").html(data);
  $("#buscar")[0].reset();
  });
});

loadTabla();


  $("#agregar").submit(function(e){
    e.preventDefault();
    $.post("./php/agregar.php",$("#agregar").serialize(),function(data){
    });
    //alert("Agregado exitosamente!");
    $("#agregar")[0].reset();
    $('#newModal').modal('hide');
    loadTabla();
  });
</script>

	</body>
</html>