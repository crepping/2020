<html>
<head>
   <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src=" https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> 
</head>
<body>
   <?php
error_reporting(0);
$mysqli =new mysqli("localhost","root","","proyecto");
$salida ="";
$variable=$_GET['id_reserva'];
$query ="update reserva set  estado_reserva=3 where id_reserva ='$variable'";
$resultado = $mysqli->query($query);
echo'
<div class="container">
<div class="alert alert-success">
    <strong>Cancelada!</strong> Reserva Cancelada.
  </div>
  </div>';
ob_start(); 
  header("refresh: 1; url = ../reservapendientes.php"); 

ob_end_flush();
	$mysqli->close();
	echo $salida; 
?> 
    
</body>
</html>

