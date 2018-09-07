<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="views/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="views/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="views/dist/plugins/iCheck/square/blue.css">
    <!-- CCS para taba dinamica avanzada -->
  <link href='views/dist/css/dataTables.bootstrap.css' rel='stylesheet'>
  <link href='views/dist/css/dataTables.responsive.css' rel='stylesheet'>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" href="views/dist/css/style.css">
</head>

<body class="hold-transition skin-blue sidebar-mini login-page">
  <?php
    session_start();
    
    if (isset($_SESSION["autenticar"]) && $_SESSION["autenticar"] == "ok") {
      include "modulos/header.php";
      include "modulos/main-sidebar.php";

      if( isset($_GET["ruta"])) {
        
        $enrutar = new ControllerEnrutamiento();
        $enrutar -> enrutamiento();

        include "modulos/modales/modales-".$_GET["ruta"].".php";

      } else {
        include "modulos/home.php";
      }
      
      include "modulos/footer.php";


    } else {
      include "modulos/login.php";
    }
    
    
  ?>
<script src="views/bower_components/jquery/dist/jquery.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
<script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="views/dist/js/adminlte.min.js"></script>
<script src="views/dist/plugins/iCheck/icheck.min.js"></script>


<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>

<script src="views/dist/js/slider.js"></script>
<script src="views/dist/js/categorias.js"></script>
<script src="views/dist/js/usuario.js"></script>
<script src="views/dist/js/subcategorias.js"></script>
<script src="views/dist/js/productos.js"></script>
<script src="views/dist/js/recursos.js"></script>

<script src="views/dist/js/jquery.dataTables.min.js"></script>
<script src="views/dist/js/dataTables.bootstrap.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script> -->

<script src="views/dist/js/graficos.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.11/dist/sweetalert2.all.min.js"></script>

</body>
</html>