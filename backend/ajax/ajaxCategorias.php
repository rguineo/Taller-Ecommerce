<?php
require_once "../controllers/categorias.controller.php";
require_once "../models/categorias.modelo.php";

Class ajaxCategoria{
	public $_idCategoria;
	public $_categoria;
	public $_ruta;
	public $_imagen;
	public $_rutaActual;

	public function crearCategoria(){
		$datos = array("categoria"=>$this->_categoria,
						"ruta"=>$this->_ruta,
						"imagen"=>$this->_imagen);

		$respuesta = ControllerCategorias::ctrCrearCategoria($datos);

		echo $respuesta;
	}


	public function editarCategoria(){
		$id_categoria = $this->_idCategoria;

		$respuesta = ControllerCategorias::ctrEditarCategoria($id_categoria);

		$datos = array("id"=>$respuesta["id"],
						"categoria"=>$respuesta["categoria"],
						"ruta"=>$respuesta["ruta"],
						"imagen"=>substr($respuesta["imagen"], 3)
						);

		echo json_encode($datos);

	}
}

$tipoOperacion = $_POST["tipoOperacion"];

if($tipoOperacion == "insertarCategoria") {
	$crearNuevaCategoria = new ajaxCategoria();
	$crearNuevaCategoria -> _categoria = $_POST["tituloCategorias"];
	$crearNuevaCategoria -> _ruta = $_POST["rutaCategorias"];
	$crearNuevaCategoria -> _imagen = $_FILES["imagenCategoria"];
	$crearNuevaCategoria -> crearCategoria();
}

if ($tipoOperacion == "tituloCategoria") {
	$editarCategoria = new ajaxCategoria();
	$editarCategoria -> _idCategoria = $_POST["id_categoria"];
	$editarSeditarCategorialider -> editarCategoria();
}

if ($tipoOperacion == "actualizarSlider") {
	$actualizarCategoria = new ajaxCategoria();
	$actualizarCategoria -> id_slider = $_POST["id_slider"];
	$actualizarCategoria -> titulo_slider = $_POST["tituloSlider"];
	$actualizarCategoria -> descripcion_slider = $_POST["descripcionSlider"];
	$actualizarCategoria -> vinculo_slider = $_POST["urlSlider"];
	$actualizarCategoria -> imagen_slider = $_FILES["imagenSlider"];
	$actualizarCategoria -> rutaActual = $_POST["rutaActual"];
	$actualizarCategoria -> actualizarSlider();
}
if ($tipoOperacion == "eliminarSlider") {
	$eliminarCategoria = new ajaxCategoria();
	$eliminarCategoria -> id_slider = $_POST["id_slider"];
	$eliminarCategoria -> imagen_slider = $_POST["rutaImagen"];
	$eliminarCategoria -> eliminarSlider();
}

?>