<?php 
  require_once('../../config/c_consultas/conexion.php');  
  $usuario = "SELECT facturas.*,clientes.nombre_cliente,users.PrimerNombre from facturas join clientes on facturas.id_cliente=clientes.id_cliente join users on users.user_id=facturas.id_vendedor";  
  $usuarios=$mysqli->query($usuario);
	 
if(isset($_POST['create_pdf'])){
	require_once('tcpdf/tcpdf.php');
	
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('');
	$pdf->SetTitle($_POST['reporte_name']);
	
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false);    
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10); 
	$pdf->addPage();


	$content = '';
	
	$content .= '
		<div class="row">
        	<div class="col-md-12">
            
           
            
            	<h1 style="text-align:center;">'.$_POST['reporte_name'].'</h1>
              
      <table border="1" cellpadding="5">
        <thead>
          <tr>
                    <th >Numero</th>
                    <th >Fecha</th>


                     <th >Cliente</th>
                     <th >Vendedor</th>
                      <th >Total</th>
                      
            

          </tr>
        </thead>
	';
	
	
	while ($user=$usuarios->fetch_assoc()) { 
			
	$content .= '
		<tr >
            <td>'.$user['numero_factura'].'</td>
            <td>'.$user['fecha_factura'].'</td>
           
           
             
            <td>'.$user['nombre_cliente'].'</td>
            <td>'.$user['PrimerNombre'].'</td>
            <td>'.$user['total_venta'].'</td>
         

          




        </tr>
	';
	}
	
	$content .= '</table>';
	
	$content .= '

  <br>

  

     <h5 >____________________________________________________________________________________________________________</h5>

     
           <h6 style="text-align:center;">Le Guppy</h5>
           <h6 style="text-align:center;">Chapinero, Bogota DC</h5>

    
            <h6 style="text-align:center;">Teléfono: +(503)2845231</h2>
            <h6 style="text-align:center;">Email:restauranteleguppy@gmail.com</h2>
            	


       
    	
	';
	
	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');
}

?>
		 
          
        
<?php
              
              session_start();
              if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
                    header("location: ../../login.php");
                exit;
                    }
              
              $active_facturas="active";
              $active_productos="";
              $active_clientes="";
              $active_usuarios="";  
              $title="Rol | Le GUPPY";
            ?>


<html lang="es">
<!DOCTYPE html>
    <head>
        <title>Productos</title>

        <style type="text/css">
          h5{
            display: inline;
            width: 30px; 
            height: 100px;
            padding: 100px;
          }
        </style>
        
    </head>
    <header>
        
        <?php include "../head.php";?>

    </header><!--  end header section  -->
  <body>
   <?php include "../navbar.php"; ?>
	<div class="w3-container">
        <div class="row padding">
        	<div class="col-md-12">
          <CENTER>

            	<?php $h1 = "Reporte de Recibos";  
            	 echo '<h3>'.$h1.'</h3>'
				?>
        </CENTER>
            </div>
        </div>
    <div class="row">

          <div class="col-md-12">
            
              <h1 style="text-align:center;"></h1>
        
      <div class="col-md-12">
        
      <table class="table" >
      <style type="text/css">

         

        </style>

        <thead class="">

         <tr  class="info">
           
                    <th >Numero</th>
                    <th >Fecha</th>


                     <th >Cliente</th>
                     <th >Vendedor</th>
                      <th >Total</th>


          </tr>
        </thead>
        <body>
        <?php 
			while ($user=$usuarios->fetch_assoc()) {   ?>
  
            <td><?php echo $user['numero_factura']; ?></td>
            <td><?php echo $user['fecha_factura']; ?></td>
            <td><?php echo $user['nombre_cliente']; ?></td>
            <td><?php echo $user['PrimerNombre']; ?></td>
            <td><?php echo $user['total_venta']; ?></td>

          </tr>
         <?php } ?>
        </body>
      </table>
      <br><br>
              <div class="col-md-12">
              <a href="../../facturas.php" class="w3-button w3-white w3-border">Atrás</a>
              	<form method="post">

                	<input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">
                  <div class="pull-right">
                    <input type="submit"  name="create_pdf" class="btn btn-primary" value="Generar PDF">
                 </div>
                	

                </form>
              </div>
      	</div>
    </div>
</body>
</html>

