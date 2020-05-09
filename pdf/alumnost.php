<?php
//error_reporting(0);
require_once('class.ezpdf.php');
$pdf = new Cezpdf('a4');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

$conexion = mysqli_connect("localhost","chilewow_root","Jugando123");
mysqli_select_db($conexion,"chilewow_citaciones1");
$rut= $_GET["alumno"];
$queEmp = "select  rut_alumno,nom_alumno,ape_alumno,rut_apoderado,Curso,direccion from alumno ";
$resEmp = mysqli_query($conexion,$queEmp ) or die(mysqli_error());
$totEmp = mysqli_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysqli_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(

				'rut_alumno'=>'<b> Rut Alumno</b>',
	            'nom_alumno'=>'<b> Nombre </b>',
     			'ape_alumno'=>'<b> Apellido </b>',
     			'rut_apoderado'=>'<b> Rut Apoderado </b>',
     			'Curso'=>'<b> Curso </b>',
     			'direccion'=>'<b> Direccion </b>',
				);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);
$txttit = "<b>INFORME DE ALUMNOS </b>\n";
$txttit.= "Colegio de Machali\n";

$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();
?>