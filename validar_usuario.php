<?php
//error_reporting(0);
include 'conexion.php';
$usu_usuario=$_POST['usuario'];
$usu_password=$_POST['password'];

//$usu_usuario="juan";
//$usu_password="reppack123";
$sentencia=$conexion->prepare("select * from usuario where user=? and pasword=?");
$sentencia->bind_param('ss',$usu_usuario,$usu_password);
$sentencia->execute();
$resultado =$sentencia ->get_result();
if ($fila =$resultado->fetch_assoc()){
    echo json_encode($fila,JSON_UNESCAPED_UNICODE);
}
$sentencia->close();
$conexion->close();
?>