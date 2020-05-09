<?php
//error_reporting(0);
require_once('class.ezpdf.php');
$pdf = new Cezpdf('A4','landscape');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

$conexion = mysqli_connect("localhost","chilewow_root","Jugando123");
mysqli_select_db($conexion,"chilewow_citaciones1");
$cod= $_GET["curso"];
$queEmp = "select  * from citaciones where curso='$cod'";
$resEmp = mysqli_query($conexion,$queEmp ) or die(mysqli_error());
$totEmp = mysqli_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysqli_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
	
				'cod'=>'<b>Codigo</b>',
     			'rut_alumno'=>'<b> Rut Alumno </b>',
     			'nombres_ap_al'=>'<b> Nombre Completo </b>',
     			'curso'=>'<b> Curso </b>',
     			'citado'=>'<b> Citado </b>',
     			'Motivo'=>'<b> Motivo </b>',
     			'Asunto'=>'<b> Detalle </b>',
     			'fecha_actual'=>'<b> Fecha </b>',
     			'fecha_cita'=>'<b> Fecha Cita </b>',
     			'hora'=>'<b> Hora </b>',
     			
				);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>800
			);
$txttit = "<b>INFORME CITAS ALUMNOS </b>\n";
$txttit.= "Colegio de Machali\n";

$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();
?>