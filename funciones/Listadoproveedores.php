
<?php
error_reporting(0);
$mysqli =new mysqli("localhost","root","","proyecto");

$salida ="";
$query ="SELECT * FROM proveedor ORDER BY id_pro ASC LIMIT 10";
if (isset($_POST['consulta'])) {
	$q = $mysqli->real_escape_string($_POST['consulta']);
	$query = "SELECT * FROM proveedor ORDER BY id_pro ASC LIMIT 10";
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
					<td>Empresa</td>
					<td>Contacto</td>
                    <td>Email</td>
                    <td>Telefono</td>
                    <td>Direccion</td>
				</tr>
				</thead>
				<tbody>";
	while($fila=$resultado->fetch_assoc()){
		$number++;
		$salida.="<tr>
                    <td><a class=\"btn btn-success\" href=\"veracuerdo.php?rut_alumno=".$fila['id_pro']."\" target=\"_blank\"onclick=\"window.open(this.href,this.target,'width=900,height=900,top=200,left=200,toolbar=no,location=no,status=no,menubar=no');return false;\"><i class=\"fas fa-edit\"></i></a></td>
                    <td><a class=\"btn btn-danger\" href=\"AccionCarta.php?action=addToCart&id=".$fila['id_pro']."\"><i class=\"far fa-trash-alt\"></i></a></td>
					<td>".$fila['id_pro']."</td>
                    <td>".$fila['rut']."</td>
					<td>".$fila['empresa']."</td>
                    <td>".$fila['vendedor']."</td>
                    <td>".$fila['email']."</td>
                    <td>".$fila['telefono']."</td>
                    <td>".$fila['direccion']."</td>
					
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