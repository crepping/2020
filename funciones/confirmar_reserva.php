<?php
error_reporting(0);
$mysqli =new mysqli("localhost","root","","proyecto");
$salida ="";
$variable=$_GET['id_reserva'];
$query ="update reserva set estado_reserva=2 Where id_reserva='$variable'";
$resultado = $mysqli->query($query);
echo"<script>alert('Reserva Aceptada Espere un momento....')</script>";
ob_start(); 
  header("refresh: 1; url = ../reservapendientes.php"); 
ob_end_flush();
	$mysqli->close();
	echo $salida; 
?>