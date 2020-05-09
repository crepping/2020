<?php
error_reporting(0);
$mysqli =new mysqli("localhost","root","","aura");

$salida ="";
$query ="SELECT *from inventariopc";
if (isset($_POST['consulta'])) {
	$q = $mysqli->real_escape_string($_POST['consulta']);
	$query = "SELECT *from inventariopc";
}
$resultado = $mysqli->query($query);
if ($resultado->num_rows >0){
	$salida.="<form method='POST'>
		<div class='table-responsive'>
				<table class='table' id='dataTable'>
				<thead>
				<tr>
					<td>Serial</td>
					<td>Modelo</td>
					<td>Marca</td>
					<td>Tipo</td>
					<td>Estado</td>
					<td>Asignado</td>
					<td>Obra</td>
					<td>FehcaAdquisicion</td>
					<td>Windows</td>
					<td>Serial Windows</td>
					<td>Office</td>
					<td>Office Serial</td>
				</tr>
				</thead>
				<tbody>";
	while($fila=$resultado->fetch_assoc()){
		$number++;
		$salida.="<tr>
					<td>".$fila['serial']."</td>
					<td>".utf8_encode($fila['modelo'])."</td>
					<td>".utf8_encode($fila['marca'])."</td>
					<td>".utf8_encode($fila['tipo'])."</td>
					<td>".utf8_encode($fila['estado'])."</td>
					<td>".utf8_encode($fila['asignado'])."</td>
					<td>".utf8_encode($fila['idobra'])."</td>
					<td>".utf8_encode($fila['fechaadquisicion'])."</td>
					<td>".utf8_encode($fila['windows'])."</td>
					<td>".utf8_encode($fila['windowserial'])."</td>
					<td>".utf8_encode($fila['office'])."</td>
					<td>".utf8_encode($fila['serialoffice'])."</td>
					
				</tr>";	
	}
	$salida.="</tbody>
	</table>
	</div>
	</form>
    ";
}else{
	$salida.="<div class='alert alert-danger'>
  <strong>NO HAY DATOS!</strong>
    </div>";

	}
	$mysqli->close();
	echo $salida;
	 
?>