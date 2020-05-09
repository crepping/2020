<?php
//error_reporting(0);
require_once('class.ezpdf.php');
$pdf = new Cezpdf('A4','landscape');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

$conexion = mysqli_connect("localhost","chilewow_root","Jugando123");
mysqli_select_db($conexion,"chilewow_citaciones1");
$cod= $_GET["acuerdo"];
$queEmp = "select  * from acuerdos where rut_alumno='$cod'";
$resEmp = mysqli_query($conexion,$queEmp ) or die(mysqli_error());
$totEmp = mysqli_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysqli_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(

     			'rut_alumno'=>'<b> Rut Alumno </b>',
     			'nombres'=>'<b> Nombre Completo </b>',
     			'Motivo'=>'<b> Motivo </b>',
     			'acuerdo'=>'<b> Detalle </b>',
     			'fecha'=>'<b> Fecha </b>',
				);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>800
			);
$txttit = "<b>INFORME ACUERDOS DE ALUMNOS </b>\n";
$txttit.= "Colegio de Machali\n";

$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();
?>