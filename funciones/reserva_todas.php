<?php
error_reporting(0);
$mysqli =new mysqli("localhost","root","","proyecto");

$salida ="";
$btn="";
$query ="select r.id_reserva,c.rut,c.nombres,c.apellidos,c.telefono,v.patente,r.fecha_reserv,r.Hora,r.ingreso_fecha,r.estado_reserva from reserva r,cliente c,vehiculo v where c.id_cliente = r.id_cliente and r.id_reserva =v.id_vehiculo order by r.ingreso_fecha desc";
if (isset($_POST['consulta'])) {
	$q = $mysqli->real_escape_string($_POST['consulta']);
$query = "select r.id_reserva,c.rut,c.nombres,c.apellidos,c.telefono,v.patente,r.fecha_reserv,r.Hora,r.ingreso_fecha,r.estado_reserva from reserva r,cliente c,vehiculo v where c.id_cliente = r.id_cliente and r.id_reserva =v.id_vehiculo order by r.ingreso_fecha desc";
}
$resultado = $mysqli->query($query);
if ($resultado->num_rows >0){
	$salida.="<form method='POST'>
		<div class='table-responsive'>
				<table class='table' id='rechazado'>
				<thead>
				<tr>		
                <td>Estado</td>
                <td>Codigo</td>
					<td>Rut</td>
					<td>Nombre Cliente</td>
                    <td>Telefono</td>
					<td>Patente</td>
                    <td>Fecha_Reserva</td>
                    <td>Hora</td>
                    <td>Fecha_Solicitud</td>
				</tr>
				</thead>
				<tbody>";
	while($fila=$resultado->fetch_assoc()){
		$number++;
        if($fila['estado_reserva']==1){
        $a="<a class=\"btn btn-warning\">Pendiente</a>";
        }
        if($fila['estado_reserva']==2){
        $a="<a class=\"btn btn-success\">Aceptada</a>";
        }
        if($fila['estado_reserva']==3){
        $a="<a class=\"btn btn-danger\">Cancelada</a>";
        }
		$salida.="<tr>
                    <td><font color='white'>".$a."</font></td>
					<td>".$fila['id_reserva']."</td>
                    <td>".$fila['rut']."</td>
					<td>".$fila['nombres'].' '.$fila['apellidos']."</td>
                    <td>".$fila['telefono']."</td>
                    <td>".$fila['patente']."</td>
                    <td>".$fila['fecha_reserv']."</td>
                    <td>".$fila['Hora']."</td>
                    <td>".$fila['ingreso_fecha']."</td>
				</tr>";	
	}
	$salida.="</tbody>
	</table>
	</div>
	</form>
	<script>
$(document).ready(function() {
$('#rechazado').DataTable({
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
    <strong>No hay Datos!</strong> No hay registro de nuevas reservas rechazadas.
  </div>
	";

	}
	$mysqli->close();
	echo $salida;
	 
?>