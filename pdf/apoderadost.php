<?php
//error_reporting(0);
require_once('class.ezpdf.php');
$pdf = new Cezpdf('a4');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

$conexion = mysqli_connect("localhost","chilewow_root","Jugando123");
mysqli_select_db($conexion,"chilewow_citaciones1");
$rut= $_GET["apoderado"];
$queEmp = "select  * from apoderado";
$resEmp = mysqli_query($conexion,$queEmp ) or die(mysqli_error());
$totEmp = mysqli_num_rows($resEmp);
	

$ixx = 0;
while($datatmp = mysqli_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(

				'rut_apoderado'=>'<b> Rut Alumno</b>',
	            'nom_apoderado'=>'<b> Nombre </b>',
     			'ape_apoderado'=>'<b> Apellido </b>',
     			'email'=>'<b> Rut Apoderado </b>',
     			'telefono'=>'<b> Curso </b>',
				);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);
$txttit = "<b>INFORME DE APODERADOS </b>\n";
$txttit.= "Colegio de Machali\n";

$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();
?>