<?php
require_once "../controllers/productos.controller.php";

require_once "../models/productos.modelo.php";

Class ajaxGrafico{

    public function crearGrafico(){
        $respuesta = (new ControllerProducto)->ctrCantidadProducto();
        echo json_encode($respuesta);
    }

}

$crearGrafico = (new ajaxGrafico);
$crearGrafico -> crearGrafico();

?>