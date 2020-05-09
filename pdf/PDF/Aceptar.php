<?php
error_reporting(0);
require_once('class.ezpdf.php');
$pdf = new Cezpdf('a4');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

$conexion = mysqli_connect("localhost","root", "");
mysqli_select_db($conexion,"citaciones");
$queEmp = "select rut_alumno,nom_alumno from alumno where estado='Nulo' order by nom_alumno ASC";
$resEmp = mysqli_query($conexion,$queEmp ) or die(mysqli_error());
$totEmp = mysqli_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysqli_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
	            'rut_alumno'=>'<b> Rut Alumno</b>',
	            'nom_alumno'=>'<b> Nombre Alumno </b>',
     			
			
				);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);
$txttit = "<b>INFORME DE CLIENTES</b>\n";
$txttit.= "HECHO POR JUAN CERNA Y GERARDO DONOSO \n";

$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();
?>