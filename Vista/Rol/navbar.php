	<?php
		if (isset($title))
		{
	?>
<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../../facturas.php">Le GUPPY.</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
    <li><a href="../../facturas.php"><i class='glyphicon glyphicon-list-alt'></i> Recibos <span class="sr-only">(current)</span></a></li>
    <li><a href="../../productos.php"><i class='glyphicon glyphicon-cutlery'></i> Productos</a></li>
    
    <li><a href="../TipoProducto/index.php"><i class='glyphicon glyphicon-barcode'></i> Tipo Productos</a></li> 
		<li><a href="../../clientes.php"><i class='glyphicon glyphicon-user'></i> Clientes</a></li>

		<li><a href="../../usuarios.php"><i  class='glyphicon glyphicon-lock'></i> Usuarios</a></li>

    <li><a href="rolVista.php"><i  class='glyphicon glyphicon-dashboard'></i> Rol</a></li>

		<li><a href="../../perfil.php"><i  class='glyphicon glyphicon-cog'></i> Configuración</a></li>  
     </ul>
      <ul class="nav navbar-nav navbar-right">
		<li><a href="../../login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<?php
		}
	?>