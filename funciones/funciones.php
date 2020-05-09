<?php
function Conectar(){
if (! ($cnn=mysqli_connect("127.0.0.1","root","")))
{
	msqyl_error();
	exit();

}
if (!mysqli_select_db($cnn,"proyecto"))
{
	exit();
}
return $cnn;
}
?>
