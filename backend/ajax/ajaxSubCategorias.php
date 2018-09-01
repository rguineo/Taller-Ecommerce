<?php
require_once "../controllers/subcategorias.controller.php";
require_once "../models/subcategorias.modelo.php";

Class ajaxSubCategorias{
    public $id;

    public function eliminarSubCategorias(){
        $id = $this->id;
        $ruta = $this->id;

		$respuesta = ControllerSubCategorias::ctrEliminarSubCategorias($id, $ruta);

        echo $respuesta;
    }
}

    $tipoOperacion = $_POST["tipoOperacion"];

    if ($tipoOperacion == "eliminarSubCategorias") {
        $eliminarSubCategorias = new ajaxSubCategorias();
        $eliminarSubCategorias -> id = $_POST["id"];
        $eliminarSubCategorias -> eliminarSubCategorias();
    }

?>

