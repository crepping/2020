
<?php
error_reporting(0);
date_default_timezone_set("America/Santiago");
$mysqli =new mysqli("localhost","root","","proyecto");
$hoy = date("d-m-Y");
$salida ="";
$query ="select r.id_reserva,c.rut,c.nombres,c.apellidos,c.telefono,v.patente,r.fecha_reserv,r.Hora,r.ingreso_fecha,r.estado_reserva,v.id_vehiculo from reserva r,cliente c,vehiculo v where c.id_cliente = r.id_cliente and c.id_cliente = v.id_cliente and r.id_vehiculo = v.id_vehiculo and r.estado_reserva = 2 and r.fecha_reserv like '$hoy' order by r.id_reserva desc";
if (isset($_POST['consulta'])) {
	$q = $mysqli->real_escape_string($_POST['consulta']);
$query ="select r.id_reserva,c.rut,c.nombres,c.apellidos,c.telefono,v.patente,r.fecha_reserv,r.Hora,r.ingreso_fecha,r.estado_reserva,v.id_vehiculo from reserva r,cliente c,vehiculo v where c.id_cliente = r.id_cliente and c.id_cliente = v.id_cliente and r.id_vehiculo = v.id_vehiculo and r.estado_reserva = 2 and r.fecha_reserv like '$hoy'";
}
$resultado = $mysqli->query($query);
if ($resultado->num_rows >0){
	$salida.="<form method='POST'>
		<div class='table-responsive'>
				<table class='table' id='taller'>
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
$('#taller').DataTable({
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
      <?php echo $hoy; ?>
	";
	 echo $hoy;

	}
	$mysqli->close();
	echo $salida;
	 
?>
