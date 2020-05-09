
<?php
error_reporting(0);
$mysqli =new mysqli("localhost","root","","proyecto");
 $hoy = date("d-m-Y");
 $variable=$_GET['id_vehiculo'];
$salida ="";
$query ="select d.id_detalle,v.patente,d.detalle,v.id_vehiculo from vehiculo v, detalle d where v.id_vehiculo = d.id_detalle and v.id_vehiculo='$variable'  ";
if (isset($_POST['consulta'])) {
	$q = $mysqli->real_escape_string($_POST['consulta']);
	$query = "select d.id_detalle,v.patente,d.detalle,v.id_vehiculo from vehiculo v, detalle d where v.id_vehiculo = d.id_detalle and v.id_vehiculo='$variable' ";
}
$resultado = $mysqli->query($query);
if ($resultado->num_rows >0){
	$salida.="<form method='POST'>
		<div class='table-responsive'>
				<table class='table' id='productos'>
				<thead>
				<tr>
                <td></td>
                <td></td>
                <td></td>
				    <td>Codigo</td>
					<td>Rut</td>
					<td>Nombre Cliente</td>
                    <td>Telefono</td>
					<td>Patente</td>
                    <td>Fecha_Reserva</td>
                    <td>Hora</td>
                    
				</tr>
				</thead>
				<tbody>";
	while($fila=$resultado->fetch_assoc()){
		$number++;
		$vehiculo =$fila['id_vehiculo'];
		$salida.="<tr>
                    <td><a class=\"btn btn-success\"  target=\"_blank\" onclick = \"createPopupWin('detalle_vehiculo.php?id_vehiculo=".$fila['id_vehiculo']."','Detalle',1200, 650);\"><i class=\"fas fa-folder-open\"></i></a></td>
                    <td><a class=\"btn btn-info\"  target=\"_blank\" onclick = \"createPopupWin('historial_vehiculos.php?id_vehiculo=".$fila['id_vehiculo']."','Detalle',1200, 650);\"><i class=\"fas fa-history\"></i></a></td>
                    <td><a class=\"btn btn-danger\" href=\"AccionCarta.php?action=addToCart&id=".$fila['id_cliente']."\"><i class=\"far fa-trash-alt\"></i></a></td>
					<td>".$fila['id_reserva']."</td>
                    <td>".$fila['rut']."</td>
					<td>".$fila['nombres'].' '.$fila['apellidos']."</td>
                    <td>".$fila['telefono']."</td>
                    <td>".$fila['patente']."</td>
                    <td>".$fila['fecha_reserv']."</td>
                    <td>".$fila['Hora']."</td>
                   
					
				</tr>";	
	}
	$salida.="</tbody>
	</table>
	</div>
	</form>
	<script>
$(document).ready(function() {
$('#productos').DataTable({
'language': {
'url': '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
}
} );
} );
</script>";
}else{
	$salida.="
	<div class='alert alert-danger alert-dismissible'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>No hay Datos!</strong> No hay registro de nuevas reservas aceptadas.
      </div>
	";

	}
	$mysqli->close();
	echo $salida;
	 
?>
