<!DOCTYPE html>
<html lang="en">
<?PHP
error_reporting(0);
include('../funciones/funciones.php');
    $cnn=Conectar();
session_start();
if(!isset($_SESSION['$id_login'])){
  session_destroy();
  header("location:../index.php");
}
?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Aura Ingenieria</title>
<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="../resources/demos/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../js/fecha.js"></script>
<style>
    .container{padding: 20px;}
    .cart-link{width: 100%;text-align: right;display: block;font-size: 22px;}
    </style>
    <script>
      
    $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '< Ant',
 nextText: 'Sig >',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
  
    </script>
</head>

<body id="page-top">

  <div id="wrapper">

    <!-- Sidebar -->
   

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Detalles</a>
          </li>
          <li class="breadcrumb-item active">Vista</li>
        </ol>
        <!-- DataTables Example -->
       <div class="container">
        <div class="panel-body">
            <br>
    <h1>Historial Detalle</h1>
    <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <br>
                    <br>
					   <div class="panel-body">
						  <div class="col-md-12">
							<div class="form-1-2">
                           <?php

                           $mysqli =new mysqli("localhost","root","","proyecto");
                            $variable=$_GET['id_vehiculo'];
                           $salida ="";
                           $query ="select * from detalle where id_vehiculo = '$variable' ";
                           if (isset($_POST['consulta'])) {
                           	$q = $mysqli->real_escape_string($_POST['consulta']);
                           	$query = "select * from detalle where id_vehiculo = '$variable' ";
                           }
                           $resultado = $mysqli->query($query);
                           if ($resultado->num_rows >0){
                           	$salida.="<form method='POST'>
                           		<div class='table-responsive'>
                           				<table class='table' id='productos'>
                           				<thead>
                           				<tr>
                                           <td></td>
                           				    <td>Codigo Detalle</td>
                           					<td>Detalle</td>
                           					</tr>
                           				</thead>
                           				<tbody>";
                           	while($fila=$resultado->fetch_assoc()){
                           		$number++;
                           		//$vehiculo =$fila['id_vehiculo'];
                           		$salida.="<tr>
                                          <td><a class=\"btn btn-success\"  target=\"_blank\" onclick = \"createPopupWin('detalle_vehiculo.php?id_vehiculo=".$fila['id_vehiculo']."','Detalle',1200, 650);\"><i class=\"fas fa-folder-open\"></i></a></td>
                           				  <td>".$fila['id_detalle']."</td>
                                          <td>".$fila['detalle']."</td>
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
                            </div>
                          </div>
                        </div>
                    </div>
             </div>

        </div>
             </div>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
    
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  

</body>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
</html>
