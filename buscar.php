<?php
error_reporting(0);
	$servername = "localhost";
    $username = "root";
  	$password = "";
  	$dbname = "proyecto";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";

    //$query = "SELECT * FROM cliente WHERE id_cliente NOT LIKE '' ORDER By id_cliente LIMIT 25";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM cliente WHERE id_cliente LIKE '%$q%' OR rut LIKE '%$q%' OR nombres LIKE '%$q%' OR apellidos LIKE '$q' OR email_cl LIKE '$q' ";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
    				

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
                        <tr><input type='number' id='cliente' required name='cliente' value=".$fila['id_cliente'].">
                        <tr><input type='text' id='nombres' required name='nombres' value=".$fila['nombres'].">
                        <tr><input type='text' id='apellido' required name='apellidos' value=".$fila['apellidos'].">
    				</tr>";

            $cliente = $_POST[$fila['id_cliente']];
    	}
    	$salida.="</tbody></table>";
    }else{
    	//$salida.="NO HAY DATOS :(";
    }
$cliente = $fila['id_cliente'];

    echo $salida;

    $conn->close();



?>