<?php
error_reporting(0);
require_once('class.ezpdf.php');
$pdf = new Cezpdf('a4');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

$conexion = mysqli_connect("localhost","root", "");
mysqli_select_db($conexion,"pedido");
$queEmp = "select estado,id_pedido,id_producto,id_login,total from pedido where estado='Pendiente'";
$resEmp = mysqli_query($conexion,$queEmp ) or die(mysqli_error());
$totEmp = mysqli_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysqli_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
				'estado'=>'<b> Estado del Pedido</b>',
	            'id_pedido'=>'<b> Codigo del Pedido </b>',
     			'id_producto'=>'<b> Codigo del Producto </b>',
	            'id_login'=>'<b> Tipo de Usuario </b>',
				'total'=>'<b> Precio Total </b>',
				);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);
$txttit = "<b>INFORME DE CLIENTES</b>\n";
$txttit.= "HECHO POR JUAN CERNA Y GERARDO DONOSO\n";

$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();
?>