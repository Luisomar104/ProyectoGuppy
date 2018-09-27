<?php

if(strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0){
	$desde = $_GET['desde'];
	$hasta = $_GET['hasta']; 

	$verDesde = date('d/m/Y', strtotime($desde));
	$verHasta = date('d/m/Y', strtotime($hasta));
}else{
	$desde = '1111-01-01';
	$hasta = '9999-12-30';

	$verDesde = '__/__/____';
	$verHasta = '__/__/____';
}
require('../fpdf/fpdf.php');
require('conexion.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../recursos/guppy.gif' ,30 ,20, 30 , 25,'GIF');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(120, 10, 'Restaurante "Le Guppy"', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Hoy: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'LISTADO DE RECIBOS', 0);
$pdf->Ln(10);
$pdf->Cell(60, 8, '', 0);
$pdf->Cell(100, 8, 'DESDE: '.$verDesde.'       HASTA: '.$verHasta, 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
//$pdf->Cell(15, 8, 'Id factura', 0);
$pdf->Cell(40, 8, 'Numero Factura', 0);
$pdf->Cell(40, 8, 'Cliente', 0);
$pdf->Cell(40, 8, 'Vendedor', 0);
//$pdf->Cell(25, 8, 'Condiciones', 0);
$pdf->Cell(45, 8, 'Total de venta', 0);
//$pdf->Cell(25, 8, 'Estado de factura', 0);
$pdf->Cell(45, 8, 'Fecha Registro', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$productos = mysqli_query($conexion,"SELECT facturas.*,clientes.nombre_cliente,users.PrimerNombre from facturas join clientes on facturas.id_cliente=clientes.id_cliente join users on users.user_id=facturas.id_vendedor WHERE fecha_factura BETWEEN '$desde' AND '$hasta' ");
$item=0;

$total = 0;
//$totaldis = 0;
while($productos2 = mysqli_fetch_array($productos)){
	$item = $item+1;
	$total = $total + $productos2['total_venta'];
	/*$totaldis = $totaldis + $productos2['precio_dist'];*/
	//$pdf->Cell(15, 8, $item);
	//$pdf->Cell(20, 8,$productos2['id_factura'], 0);
	$pdf->Cell(40, 8,$productos2['numero_factura'], 0);
	$pdf->Cell(40, 8, $productos2['nombre_cliente'], 0);
	$pdf->Cell(40, 8,$productos2['PrimerNombre'], 0);
	//$pdf->Cell(25, 8,$productos2['condiciones'], 0);
	$pdf->Cell(45, 8,$productos2['total_venta'], 0);
	//$pdf->Cell(25, 8,$productos2['estado_factura'], 0);
	$pdf->Cell(45, 8, date('d/m/Y', strtotime($productos2['fecha_factura'])), 0);
	$pdf->Ln(8);
}
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(1,8,'',0);

$pdf->Cell(40,18,'TOTAL DE VENTAS:  '.  $total,0);



//$pdf->Cell(32,8,'Total Dist: S/. '.$totaldis,0);*/

$pdf->Output('reporte.pdf','D');
?>