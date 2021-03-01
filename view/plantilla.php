<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>La Gran Familia R&S</title>
  <!-- ICONO DEL SISTEMA -->
  <link rel="icon" href="view/img/plantilla/icono-negro.png">

  <!-- PLUGINS DE CSS -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="view/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="view/dist/css/adminlte.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="view/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="view/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="view/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
  <!-- PLUGINS DE JAVASCRIPT -->
  <!-- jQuery -->
  <script src="view/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="view/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="view/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="view/dist/js/demo.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="view/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="view/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="view/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="view/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="view/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="view/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="view/plugins/jszip/jszip.min.js"></script>
  <script src="view/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="view/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="view/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="view/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="view/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <!-- Sweetalert2 -->
  <script src="view/plugins/sweetalert2/sweetalert2.all.js"></script>
  
</head>

<!-- CUERPO DOCUMENTO -->
<!-- <body class="hold-transition sidebar-collapse sidebar-mini login-page"> -->

  <?php

    if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){
    
    echo '<body class="hold-transition sidebar-collapse sidebar-mini">';
    echo '<div class="wrapper">';
    
    // CABECERA
    include "modules/cabezote.php";
    // BARRA LATERAL
    include "modules/menu.php";
    // CONTENIDO
    if(isset($_GET["ruta"])){
      
      if($_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "usuarios" ||
        $_GET["ruta"] == "categorias" ||
        $_GET["ruta"] == "productos" ||
        $_GET["ruta"] == "clientes" ||
        $_GET["ruta"] == "admin-venta" ||
        $_GET["ruta"] == "crear-venta" ||
        $_GET["ruta"] == "report-venta" ||
        $_GET["ruta"] == "salir"){
          
        include "modules/".$_GET["ruta"].".php";

      }else{

        include "modules/404.php";

      }
    }else{

      include "modules/inicio.php";

    }
    // PIE DE PÁGINA
    include "modules/footer.php";

    echo '</div>';
    echo '<script src="view/js/plantilla.js"></script>';
    echo '<script src="view/js/usuarios.js"></script>';
    echo '<script src="view/js/categorias.js"></script>';
    echo '</body>';
  }else{

    include "modules/login.php";

  }
  ?>
<!-- </body> -->
</html>
