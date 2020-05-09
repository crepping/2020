
<?php
error_reporting(0);
$mysqli =new mysqli("localhost","root","","proyecto");

$salida ="";
$query ="SELECT * FROM mis_productos ORDER BY id ASC LIMIT 10";
if (isset($_POST['consulta'])) {
	$q = $mysqli->real_escape_string($_POST['consulta']);
	$query = "SELECT * FROM mis_productos ORDER BY id ASC LIMIT 10";
}
$resultado = $mysqli->query($query);
if ($resultado->num_rows >0){
	$salida.="<form method='POST'>
		<div class='table-responsive'>
				<table class='table' id='productos'>
				<thead>
				<tr>
				<td>Codigo</td>
                <td>Cod Barra</td>
					<td>Producto</td>
					<td>Descripcion</td>
                    <td>Stock</td>
					<td>Precio</td>
				</tr>
				</thead>
				<tbody>";
	while($fila=$resultado->fetch_assoc()){
		$number++;
		$salida.="<tr>
					<td>".$fila['id']."</td>
                    <td>".$fila['Barra']."</td>
					<td>".$fila['name']."</td>
					<td>".utf8_encode($fila['description'])."</td>
                    <td>".$fila['Stock']."</td>
					<td>$".utf8_encode(number_format($fila['price']))."</td>
				</tr>";	
	}
	$salida.="</tbody>
	</table>
	</div>
	</form>
	<script>
$(document).ready(function() {
$('div.dataTables_filter input').focus();
$('#productos').DataTable({
'language': {
'url': '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
}
} );
} );
</script>";
}else{
	$salida.="
    <div class=\"container\">
<div class=\"alert alert-danger\">
    <strong>Error!</strong> No hay productos en la tienda.
  </div>
  </div>
    
    ";

	}
	$mysqli->close();
	echo $salida;
	 
?>