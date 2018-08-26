<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <?php 

    $urlFrontEnd = Rutas::urlFrontEnd();
    $urlBackEnd = Rutas::urlBackEnd();

    ?>

    <link rel="stylesheet" href="<?php echo $urlFrontEnd; ?>views/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $urlFrontEnd; ?>views/css/estilos.css">
    <link rel="stylesheet" href="<?php echo $urlFrontEnd; ?>views/css/slider.css">

    <title>Tienda Virtual</title>
  </head>
  <body>
    
    <?php 

    include "modules/header.php";

    $rutaCero = array();
    if ( isset($_GET["ruta"]) ) {
        $rutaExiste = false;
        $valorRuta = $_GET["ruta"];
        $rutaCero = $valorRuta;
        $rutaCero = explode("/", $rutaCero);
        $columna = "ruta";

        $categoria = ControllerProductos::ctrMostrarCategorias($columna, $rutaCero[0]);
  
        if ( $rutaCero[0] == $categoria["ruta"]) {
           $rutaExiste = true;
        } 
        $subCategorias = ControllerProductos::ctrMostrarSubCategorias($columna, $rutaCero[0]);
        foreach ($subCategorias as $key => $value) {
            if ( $valorRuta == $value["ruta"]) {
                $rutaExiste = true;
            }
        }
        if($rutaExiste == true) {
            include "modules/productos.php";
        }
        else {
            include "modules/error404.php";
        }

    } else {
        include "modules/slider.php";
        include "modules/ultimos-productos.php";
    }

    ?>

    <script src="<?php echo $urlFrontEnd; ?>views/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $urlFrontEnd; ?>views/js/bootstrap.js"></script>
    <script src="<?php echo $urlFrontEnd; ?>views/js/vue.js"></script>
    <script src="<?php echo $urlFrontEnd; ?>views/js/header.js"></script>
    <script src="<?php echo $urlFrontEnd; ?>views/js/slider.js"></script>
 

  </body>
</html>