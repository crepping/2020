
<?php
error_reporting(0);
$mysqli =new mysqli("localhost","root","","proyecto");

$salida ="";
$query ="select r.id_reserva,c.rut,c.nombres,c.apellidos,c.telefono,v.patente,r.fecha_reserv,r.Hora from reserva r,cliente c,vehiculo v where c.id_cliente = r.id_cliente and r.id_reserva =v.id_vehiculo";
if (isset($_POST['consulta'])) {
	$q = $mysqli->real_escape_string($_POST['consulta']);
	$query = "select r.id_reserva,c.rut,c.nombres,c.apellidos,c.telefono,v.patente,r.fecha_reserv,r.Hora from reserva r,cliente c,vehiculo v where c.id_cliente = r.id_cliente and r.id_reserva =v.id_vehiculo";
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
		$salida.="<tr>
                    <td><a class=\"btn btn-success\" href=\"veracuerdo.php?rut_alumno=".$fila['ic_cliente']."\" target=\"_blank\"onclick=\"window.open(this.href,this.target,'width=900,height=900,top=200,left=200,toolbar=no,location=no,status=no,menubar=no');return false;\"><i class=\"fas fa-edit\"></i></a></td>
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
	$salida.="no hay datos";

	}
	$mysqli->close();
	echo $salida;
	 
?>