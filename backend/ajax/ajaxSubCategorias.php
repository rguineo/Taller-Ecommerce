<?php
require_once "../controllers/subcategorias.controller.php";
require_once "../models/subcategorias.modelo.php";

Class ajaxSubCategorias{
    public $_id;
    public $_idCategoria;
    public $_subCategoria;
    public $_rutaSubcategoria;
    public $_imagenSubcategoria;


    public function eliminarSubCategorias(){
        $id = $this->_id;
        $ruta = $this->_imagenSubcategoria;

		$respuesta = (new ControllerSubCategorias)->ctrEliminarSubCategorias($id, $ruta);

        echo $respuesta;
    }

    public function crearSubCategorias(){
		$datos = array("subcategoria"=>$this->_subCategoria,
                        "ruta"=>$this->_rutaSubcategoria,
                        "id_categoria"=>$this->_idCategoria,
						"imagen"=>$this->_imagenSubcategoria);

		$respuesta = (new ControllerSubCategorias)->ctrCrearSubCategorias($datos);

		echo $respuesta;
	}

}

    $tipoOperacion = $_POST["tipoOperacion"];

    if ($tipoOperacion == "eliminarSubCategorias") {
        $eliminarSubCategorias = new ajaxSubCategorias();
		$eliminarSubCategorias -> _id = $_POST["id"];
		$eliminarSubCategorias -> _imagenSubcategoria = $_POST["rutaImagen"];
        $eliminarSubCategorias -> eliminarSubCategorias();
    }

	if($tipoOperacion == "insertarSubCategoria") {
        $crearNuevaSubCategoria = new ajaxSubCategorias();
        $crearNuevaSubCategoria -> _idCategoria = $_POST["idCategorias"];
		$crearNuevaSubCategoria -> _subCategoria = $_POST["NomSubCate"];
		$crearNuevaSubCategoria -> _rutaSubcategoria = $_POST["rutaSubCategorias"];
		$crearNuevaSubCategoria -> _imagenSubcategoria = $_FILES["imagenSubCategoria"];
		$crearNuevaSubCategoria -> crearSubCategorias();
	}

	if ($tipoOperacion == "editarCategoria") {
		$editarCategoria = new ajaxCategorias();
		$editarCategoria -> _idCategoria = $_POST["id"];
		$editarCategoria -> editarCategorias();
	}

	if ($tipoOperacion == "actualizarCategoria") {
		$actualizarCategoria = new ajaxCategorias();
		$actualizarCategoria -> _idCategoria = $_POST["id"];
		$actualizarCategoria -> _categoria = $_POST["EtituloCategoria"];
		$actualizarCategoria -> _ruta = $_POST["ErutaCategoria"];
		$actualizarCategoria -> _imagen = $_FILES["imagenCategoria"];
		$actualizarCategoria -> _rutaActual = $_POST["rutaActual"];
		$actualizarCategoria -> actualizarCategorias();
	}
?>

