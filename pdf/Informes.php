<!DOCTYPE html>
<?php
include("funciones/funciones.php");
error_reporting(0);
session_start();
if(!isset($_SESSION['$nuestroTipo'])){
  session_destroy();
  header("location:index.php");
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Colegio Machali</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="css/style.css">
        <script src="js/validar.js"></script>
        <script src="js/js.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Citaciones</h3>
                </div>

                <ul class="list-unstyled components">
                    <p>Machali</p>
                    <li class="active">
                        <a href="index.php" data-toggle="collapse" aria-expanded="false">INICIO</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="index.php">Home 1</a></li>
                           <li><a href="#">Ingresar Apoderado</a></li>
                            <li><a href="#">Ingresar Alumno</a></li>
                        </ul>
                    </li>
                    <li>
                        <!-- <a href="#">Ingreso</a>-->
                        <a href="#pageSubmenu" data-toggle="collapse" class=" " aria-expanded="false">Ingreso</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                           <li><a href="apoderado.php">Ingresar Apoderado</a></li>
                            <li><a href="alumno.php">Ingresar Alumno</a></li>
                            <li><a href="Listadosalumnos.php">Listado Alumnos</a></li>
                        </ul>
                    </li>
                    <li>
                       <a href="#submenu" data-toggle="collapse" class=" " aria-expanded="false">Informes PDF</a>
                        <ul class="collapse list-unstyled" id="submenu">
                           <li><a href="Informes.php">Alumnso Cursos</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>

                <ul class="list-unstyled CTAs">
                    <!-- <li><a href="" class="download">Download source</a></li>
                    <li><a href="" class="article">Back to article</a></li>-->
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                           
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                              <li class="nav-item active">
                                <li><a href="index.php"></a></li>
                                 <li><a  value=<?php echo"<font color=\"orange\">Usuario :\n".$_SESSION['$nuestroNombre'];?></a></li>
                             <li><a href="index.php">Desconectar</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

            <h2>Informes por Cursos</h2>
            <FORM  action="PDF/alumnos.php" METHOD="GET" target="_blank">
            <div class="form-group">
            <label for="apoderado">Cursos</label>
            <select required class="form-control" id="apoderado" name="curso" style="width:120px" >
           <?php
            $cnn=Conectar();
            $tabla_deptos = mysqli_query($cnn,"SELECT estado FROM alumno");
            while($depto = mysqli_fetch_array($tabla_deptos)) {
            echo "<option value='".$depto['estado']."'>".$depto['estado']."</option>";
            }
            ?>
        </select>
         <input class="btn btn-dark" type="submit" value="PDF">
        </FORM>
        </div>
    </div>

   <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
</body>

</html>