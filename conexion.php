<?php
$hostname='localhost';
$database='proyecto';
$username='root';
$password='';
$conexion =new mysqli("localhost","root","","proyecto");
if($conexion->connect_errno){
    echo "Error en la conexion";
}
?>