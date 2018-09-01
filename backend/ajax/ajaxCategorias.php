<?php
require_once "../controllers/categorias.controller.php";
require_once "../models/categorias.modelo.php";

Class ajaxCategorias{
	public $_idCategoria;
	public $_categoria;
	public $_ruta;
	public $_imagen;
	public $_rutaActual;

	public function crearCategorias(){
		$datos = array("categoria"=>$this->_categoria,
						"ruta"=>$this->_ruta,
						"imagen"=>$this->_imagen);

		$respuesta = (new ControllerCategorias)->ctrCrearCategorias($datos);

		echo $respuesta;
	}
	public function editarCategoria(){
		$id_categoria = $this->_idCategoria;

		$respuesta = (new ControllerCategorias)->ctrEditarCategoria($id_categoria);

		$datos = array("id"=>$respuesta["id"],
						"categoria"=>$respuesta["categoria"],
						"ruta"=>$respuesta["ruta"],
						"imagen"=>substr($respuesta["imagen"], 3)
						);

		echo json_encode($datos);

	}
	public function actualizarCategorias(){
		$datos = array( "id"=>$this->_idCategoria,
						"categoria"=>$this->_categoria,
						"ruta"=>$this->_ruta,
                        "imagen"=>$this->_imagen,
                        "rutaActual"=>$this->_rutaActual
						);

		$respuesta = ControllerCategorias::ctrActualizarCategoria($datos);

		echo $respuesta;
	}
}

	$tipoOperacion = $_POST["tipoOperacion"];

	if($tipoOperacion == "insertarCategoria") {
		$crearNuevaCategoria = new ajaxCategorias();
		$crearNuevaCategoria -> _categoria = $_POST["tituloCategorias"];
		$crearNuevaCategoria -> _ruta = $_POST["rutaCategorias"];
		$crearNuevaCategoria -> _imagen = $_FILES["imagenCategoria"];
		$crearNuevaCategoria -> crearCategorias();
	}

	if ($tipoOperacion == "editarCategoria") {
		$editarCategoria = new ajaxCategorias();
		$editarCategoria -> _idCategoria = $_POST["id_categoria"];
		$editarCategoria -> editarCategorias();
	}

	if ($tipoOperacion == "actualizarCategorias") {
		$actualizarCategoria = new ajaxCategorias();
		$actualizarCategoria -> _idCategoria = $_POST["id"];
		$actualizarCategoria -> _categoria = $_POST["categoria"];
		$actualizarCategoria -> _ruta = $_POST["ruta"];
		$actualizarCategoria -> _imagen = $_FILES["imagen"];
		$actualizarCategoria -> _rutaActual = $_POST["rutaActual"];
		$actualizarCategoria -> actualizarCategoria();
	}

?>