<!DOCTYPE html>
<html lang="es">

<head>
<?php
error_reporting(0);
include("funciones/funciones.php");
session_start();
?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form role="form" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="login" class="form-control" placeholder="Ingresa Usuario" name="login" required="required" autofocus="autofocus">
              <label for="inputEmail">Usuario</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="pass" class="form-control" placeholder="Password" name="pass" required="required">
              <label for="inputPassword">Contraseña</label>
            </div>
            </div>
          <button class="btn btn-lg btn-primary btn-block"  name="btnAceptar" value="Aceptar" type="Submit">Conectar</button>
        </form>
        <?php  
if($_POST['btnAceptar'] == "Aceptar") 
{
   $cnn= Conectar();
   $user=$_POST['login'];
   $clave=$_POST['pass'];
   $sql="Select * from usuario where user='$user' and pasword='$clave'";
$rs=mysqli_query($cnn,$sql);
if (mysqli_num_rows($rs)!=0) 
   {
   if ($row=mysqli_fetch_array($rs)) 
   {  
$_SESSION['$nuestroNombre']=$row["nombres"];
$_SESSION['$apellidos']=$row["apellidos"];
$_SESSION['$nestroCargo']=$row["cargo"];
$_SESSION['$nuestroTipo']=$row["tipo"];
$_SESSION['$id_login']=$row["id"];

   
   switch ($_SESSION['$nuestrotipo']=$row["tipo"]) 
   {

     case 1:
       echo"<script>alert('Bienvenido(a)')</script>";
       echo"<script type='text/javascript'>window.location='Compra.php'</script>";
     break;

     case 2:
      echo"<script>alert('Bienvenido(a)')</script>";
       echo"<script type='text/javascript'>window.location='mecanico/listacar.php';</script>";
       break;
     
     case 3:
      echo"<script>alert('Bienvenido(a)')</script>";
       echo"<script type='text/javascript'>window.location='acp_precitacion1.php';</script>";
       break;

     default:
       echo"<script>alert('Usted no es usuario') </script>";
       echo"<script type='text/javascript'>window.location='index.php';</script>";
       break;
    

    }
    }
    
    }else{

      echo"<script>alert('usuario o clave Incorrecta') </script>";
        
   }
}
?>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
