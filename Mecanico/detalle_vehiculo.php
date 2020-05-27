<!DOCTYPE html>
<html lang="en">
<?PHP
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
            <a href="#">Ingreso</a>
          </li>
          <li class="breadcrumb-item active">Vista</li>
        </ol>
        <!-- DataTables Example -->
       <div class="container">
        <div class="panel-body">
            <br>
    <h1>Ingresar Detalle Vehiculo</h1>
    <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <br>
                    <br>
					   <div class="panel-body">
						  <div class="col-md-12">
							<div class="form-1-2">
 <?php
 $variable=$_GET['id_vehiculo'];
 $sql ="select  v.id_vehiculo,c.id_cliente,c.nombres,c.apellidos,v.patente from vehiculo v,cliente c where c.id_cliente = v.id_cliente and v.id_vehiculo= '$variable' ";
$rs = mysqli_query($cnn,$sql);

            if ( $row = mysqli_fetch_array($rs) ) {
               
                $cod=$row["id_vehiculo"];
                $patente = $row["patente"];
                $cliente=$row["id_cliente"];
                $nom =$row["nombres"];
                $ape =$row["apellidos"];
            }
		//$citado=$_SESSION['$nuestroNombre']." ".$_SESSION['$apellidos'];
 ?>
  <form method="POST">
  <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputRut">Patente</label>
        <input type="text" class="form-control"  name="codigo" value="<?php  echo $patente; ?>" required  readonly>
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nom" readonly  value="<?php  echo $nom; ?>">
      </div>
        <div class="form-group col-md-6">
        <label for="inputApellido">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="ape" readonly value="<?php echo $ape; ?>">
      </div>
    </div>

   <textarea name="detalle" rows="6" cols="100" placeholder="Detalles"></textarea>
    <br>
    <button type="submit" name="aceptar" value="Ingresar Detalle" class="btn btn-primary">Ingresar Detalle</button>
    <?php   
    echo $cliente ;
    ?>
    <br>
    <?php
    echo $cod;
    
    ?>
  </form>
</form>
    <?php  
     //error_reporting(0);
    if($_POST['aceptar']=="Ingresar Detalle"){
    $session = $_SESSION['$id_login'];
    $detalle=$_POST['detalle'];
    $hoy = date("Y-m-d H:i:s");
    $in="insert into detalle(id,id_vehiculo,detalle,fecha_detalle) values ('$session','$cod','$detalle','$hoy')";   
    $dato=mysqli_query($cnn,$in); 
    if (!$dato) {
    echo"<br>"."<br>";
      echo"<script>alert('Error de ingreso Detalle')</script>";
    }else{
    echo"<br>"."<br>";
   echo"<script>alert('Detalle Ingresado')</script>";
  //echo"<script type='text/javascript'>window.location='alumnotodos.php'</script>";
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
