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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src=" https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="js/JsBarcode.all.min.js"></script>
    <script src="js/jquery-code-scanner.js"></script>
<style>
    .container{padding: 20px;}
    .cart-link{width: 100%;text-align: right;display: block;font-size: 22px;}
    </style> 
</head>
  

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">COMPRAS</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php
      include("menu/nav.php");
    ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Inventario</a>
          </li>
          <li class="breadcrumb-item active">Vista</li>
        </ol>
        <!-- DataTables Example -->
       <div class="container">
        <div class="panel-body">
    <h1>Mis Productos</h1>
    <a href="VerCarta.php" class="cart-link" title="Ver Carta"><i class="fas fa-shopping-cart"></i></a>
    <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Ingresar Producto</div>
					   <div class="panel-body">
						  <div class="col-md-12">
							<div class="form-1-2">
                            <form method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Codigo</label>
      <input type="text" class="form-control" name="cod"  id="code-scan" autocomplete="off" onkeyup="Lector(code);" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Nombre</label>
      <input type="text" class="form-control" id="inputPassword4" name="nomb" placeholder="Nombre producto" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Descripcion</label>
    <input type="text" class="form-control" id="inputAddress" name="Des" placeholder="Descripcion Categoria" required>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Precio</label>
    <input type="text" class="form-control" id="inputAddress2" name="precio" required placeholder="Precio Total" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Stock</label>
      <input type="num" class="form-control" id="inputCity" name="stock" placeholder="Stock Total" required>
    </div>
  </div>
  
  <button type="submit" name="aceptar" value="Ingresar Reserva" class="btn btn-primary">Ingresar Cliente</button>  

</form>
<?php
  //error_reporting(0);
  if($_POST['aceptar']=="Ingresar Reserva"){

    $codigo = $_POST['cod'];
    $nom = $_POST['nomb'];
    $des = $_POST['Des'];
    $pre = $_POST['precio'];
    $stock =$_POST['stock'];
    $hoy = date("Y-m-d H:i:s");
    
    $ver ="SELECT * FROM mis_productos WHERE Barra ='$codigo' ";
    $busqueda= mysqli_query($cnn,$ver);
    if(mysqli_num_rows($busqueda)>0) { 
       echo"<br>"."<br>";
    echo"<script>alert('El producto ya Existe')</script>";
    } else {
    $in="insert into mis_productos(Barra,name,description,price,Stock,created) values ('$codigo','$nom','$des','$pre','$stock','$hoy')";   
    $dato=mysqli_query($cnn,$in); 
    if (!$dato) {
    echo"<br>"."<br>";
      echo"<script>alert('Error de ingresar producto')</script>";
    }else{
    echo"<br>"."<br>";
   echo"<script>alert('Producto Ingreso')</script>";
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
 <script src="vendor/datatables/jquery-3.3.1.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/chart-area-demo.js"></script>
<!-- Bootstrap core JavaScript-->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
    
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="vendor/datatables/buttons.print.min.js"></script>
    <script src="vendor/datatables/dataTables.buttons.min.js"></script>
    <script src="vendor/datatables/pdfmake.min.js"></script>
    <script src="vendor/datatables/vfs_fonts.js"></script>
    <script src="vendor/datatables/buttons.html5.min.js"></script>
    <script src="vendor/datatables/jszip.min.js"></script>
    <script src="vendor/datatables/buttons.colVis.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script>
  function Lector(barcode){
    $(document).ready(function() { 
      var barcode=""; 
      $(document).keydown(function(e) { 
        var code = (e.keyCode ? e.keyCode : e.which); 
        if(code==13){ 
          //alert(barcode); 
          } else if(code==9){ 
            //alert(barcode); 
            } else { 
              barcode=barcode+String.fromCharCode(code);
               } 
              }); 
          }); 
  }
</script>

  <!-- Demo scripts for this page-->
  <script>
 $(document).ready(function() {
    $('#dataTable').DataTable( {
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: 'Bfrtip',
        buttons: [
            {
            text:'Paginar',
                 className: 'red',
                extend: 'pageLength',
                orientation: 'landscape',
                pageSize: 'A4'
            },
            {
            text:'Descargar PDF',
                 className: 'red',
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A4'
            },
            {
            text:'Imprimir',
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                    
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }
            
        ],
        'language': {
'url': '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
}
        
    } );
     
} );
      
    </script>
</body>

</html>
