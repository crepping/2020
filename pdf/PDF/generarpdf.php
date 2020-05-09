<?php
error_reporting(0);
require_once('class.ezpdf.php');
$pdf = new Cezpdf('a4');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1,5);
$n=$_GET['id'];

$txttit.="<b>\n\n\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tCertificado para el alumno </b>\n\n\n\n\n";
$conexion = mysqli_connect("localhost","root", "");
mysqli_select_db($conexion,"cliente");
$queEmp = "select a.nomb_a,a.ap_Pat,a.ap_Mat,a.rut_a,c.curso_c from alumno a, curso c where
(a.curso_A=c.nombre_c)and (a.id_a='$n')";
$resEmp = mysqli_query($conexion,$queEmp ) or die(mysqli_error());
$totEmp = mysqli_num_rows($resEmp);


while($datatmp = mysqli_fetch_assoc($resEmp)) { 
$txttit.="El Profesor Claudio Duque Felicita al Alumno(a). Don (a): <b>$datatmp[nomb_a] $datatmp[ap_Pat] $datatmp[ap_Mat]<b> con Rut $datatmp[rut_a], cursa el $datatmp[curso_c] año del educacion en nuestro establecimiento
";
}

$pdf->ezText($txttit, 16);
$pdf->ezText($txttit1, 10);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();
?>