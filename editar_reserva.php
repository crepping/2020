<!DOCTYPE html>
<html lang="en">
<?PHP
include('funciones/funciones.php');
    $cnn=Conectar();
session_start();
if(!isset($_SESSION['$id_login'])){
  session_destroy();
  header("location:index.php");
}
?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Aura Ingenieria</title>
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/fecha.js"></script>
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
            <a href="#">Ingreso</a>
          </li>
          <li class="breadcrumb-item active">Vista</li>
        </ol>
        <!-- DataTables Example -->
       <div class="container">
        <div class="panel-body">
            <br>
    <h1>Editar Cita</h1>
    <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <br>
                    <br>
					   <div class="panel-body">
						  <div class="col-md-12">
							<div class="form-1-2">
 <?php
 $variable=$_GET['id_reserva'];
 $sql ="select *from reserva where id_reserva ='$variable'" ;
 //"rut_apoderado='$variable'
$rs = mysqli_query($cnn,$sql);

            if ( $row = mysqli_fetch_array($rs) ) {
               
               $cod=$row["id_reserva"];
                $fec=$row["fecha_reserv"];
                $h=$row["Hora"];
                
                  
            }
		//$citado=$_SESSION['$nuestroNombre']." ".$_SESSION['$apellidos'];
 ?>
                            <form method="POST">
  <div class="form-row">
<!--
    <div class="form-group col-md-6">
      <label for="inputRut">Rut</label>
      <input type="text" class="form-control" oninput="checkRut(this)" name="rut" id="rut" placeholder="Rut Cliente o Empresa">
    </div>
          -->
      <div class="form-group col-md-6">
      <label for="inputApellido">Fecha</label>
      <input type="text" class="form-control" name="fechacita"  autocomplete="off" required id="datepicker">
    </div>
    <div class="form-group col-md-6">
      <label for="inputhora">Hora</label>
      <select required class="form-control" id="horario" name="horario"  required>
              <option value=10:00>10:00 AM</option>
 			  <option value=11:00>11:00 AM</option>
              <option value=12:00>12:00 AM</option>
              <option value=13:00>13:00 PM</option>
        	</select>
    </div>
  </div>
 <br>
 <br>
<div class="col text-center">
  <button type="submit" name="aceptar" value="Ingresar Reserva" class="btn btn-primary">Editar Cita</button>  
</div>
</form>
    <?php  
     error_reporting(0);
    if($_POST['aceptar']=="Ingresar Reserva"){
     
    $cod=$cod;
    $car=$_POST['car'];
    $fecha=$_POST['fechacita'];
    $hora=$_POST['horario'];
    $hoy = date("Y-m-d H:i:s");
    $ver ="SELECT * FROM reserva WHERE fecha_reserv='$fecha' and Hora='$hora' and estado_reserva = 0";
    $busqueda= mysqli_query($cnn,$ver);
    if(mysqli_num_rows($busqueda)>0) { 
       echo"<br>"."<br>";
    echo"<script>alert('La Reserva Ya existe')</script>";
      
    } else {
    $in="update reserva set fecha_reserv='$fecha', Hora='$hora', ingreso_fecha='$hoy' where id_reserva='$variable'";   
    $dato=mysqli_query($cnn,$in); 
    if (!$dato) {
    echo"<br>"."<br>";
      echo"<script>alert('Error de Reserva')</script>";
    }else{
    echo"<br>"."<br>";
   echo"<script>alert('Reserva Agendada')</script>";
  //echo"<script type='text/javascript'>window.location='alumnotodos.php'</script>";
    }
}
}
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

</html>
